<?php

namespace App\Http\Controllers;

use App\Mail\FixItNowCustomerConfirmation;
use App\Mail\FixItNowInternalNotification;
use App\Models\Role;
use App\Models\ServiceRequest;
use App\Services\CalendlyTokenStore;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\View\View;

class CalendlyController extends Controller
{
    public function __construct(private readonly CalendlyTokenStore $tokenStore)
    {
    }

    public function showFixNow(): View
    {
        return view('fix-now.index');
    }

    public function redirectToCalendly(Request $request): RedirectResponse
    {
        $clientId = config('services.calendly.client_id');
        if (! $clientId) {
            abort(Response::HTTP_INTERNAL_SERVER_ERROR, 'Calendly client ID missing.');
        }
        $redirectUri = route('calendly.callback');
        $state = Str::random(32);

        $request->session()->put('calendly_oauth_state', $state);

        $query = http_build_query([
            'client_id' => $clientId,
            'redirect_uri' => $redirectUri,
            'response_type' => 'code',
            'scope' => 'default',
            'state' => $state,
        ]);

        return redirect()->away("https://auth.calendly.com/oauth/authorize?{$query}");
    }

    public function handleCallback(Request $request): RedirectResponse
    {
        $state = $request->session()->pull('calendly_oauth_state');
        if (! $state || $state !== $request->query('state')) {
            abort(Response::HTTP_FORBIDDEN, 'Invalid OAuth state.');
        }

        $code = $request->query('code');
        if (! $code) {
            abort(Response::HTTP_BAD_REQUEST, 'Missing authorization code.');
        }

        $response = Http::asForm()->post('https://auth.calendly.com/oauth/token', [
            'grant_type' => 'authorization_code',
            'client_id' => config('services.calendly.client_id'),
            'client_secret' => config('services.calendly.client_secret'),
            'redirect_uri' => route('calendly.callback'),
            'code' => $code,
        ]);

        if ($response->failed()) {
            abort(Response::HTTP_BAD_GATEWAY, 'Unable to complete Calendly authentication.');
        }

        $this->tokenStore->put($response->json());

        $bookingUrl = config('services.calendly.event_type_url');
        if (! $bookingUrl) {
            abort(Response::HTTP_INTERNAL_SERVER_ERROR, 'Calendly event type URL missing.');
        }

        $redirectParams = [
            'utm_source' => 'happytek',
            'redirect_to' => route('fix-now.confirmed'),
        ];

        $separator = str_contains($bookingUrl, '?') ? '&' : '?';
        $bookingUrl .= $separator.http_build_query($redirectParams);

        return redirect()->away($bookingUrl);
    }

    public function handleWebhook(Request $request): Response
    {
        if (! $this->isValidSignature($request)) {
            abort(Response::HTTP_UNAUTHORIZED, 'Invalid signature.');
        }

        if ($request->input('event') !== 'invitee.created') {
            return response()->json(['ignored' => true]);
        }

        $payload = $request->input('payload', []);
        $invitee = Arr::get($payload, 'invitee', []);
        $event = Arr::get($payload, 'event', []);
        $eventType = Arr::get($payload, 'event_type', []);
        $scheduledEvent = is_array($event) ? $event : [];
        $tracking = Arr::get($payload, 'tracking', []);

        $eventUuid = $scheduledEvent['uuid']
            ?? (isset($scheduledEvent['uri']) ? Str::afterLast($scheduledEvent['uri'], '/') : null)
            ?? (is_string($event) ? Str::afterLast($event, '/') : null);

        $scheduledAt = null;

        if (isset($scheduledEvent['start_time'])) {
            $scheduledAt = Carbon::parse($scheduledEvent['start_time']);
        } elseif (Arr::has($payload, 'scheduled_event.start_time')) {
            $scheduledAt = Carbon::parse(Arr::get($payload, 'scheduled_event.start_time'));
        }

        $duration = $scheduledEvent['duration']
            ?? Arr::get($payload, 'scheduled_event.event.duration');

        $eventTypeName = $eventType['name']
            ?? Arr::get($scheduledEvent, 'event_type.name')
            ?? Arr::get($payload, 'scheduled_event.event_type.name');

        $requestId = null;

        if (is_array($tracking)) {
            $requestId = Arr::get($tracking, 'utm_content');
        }

        if (is_string($requestId) && ! ctype_digit((string) $requestId)) {
            $requestId = preg_replace('/\D/', '', $requestId) ?: null;
        }

        $serviceRequest = $requestId
            ? ServiceRequest::find($requestId)
            : null;

        if (! $serviceRequest || ! in_array($serviceRequest->status, ['draft', 'submitted'])) {
            return response()->json(['ignored' => true], Response::HTTP_ACCEPTED);
        }

        $serviceRequest->forceFill([
            'name' => $invitee['name'] ?? $serviceRequest->name,
            'email' => $invitee['email'] ?? $serviceRequest->email,
            'path' => 'fix_now',
            'status' => 'booked',
            'calendly_event_uuid' => $eventUuid,
            'scheduled_at' => $scheduledAt,
            'duration' => $duration,
            'event_type_name' => $eventTypeName,
        ])->save();

        if ($serviceRequest->wasChanged()) {
            if ($serviceRequest->email) {
                Mail::to($serviceRequest->email)->send(new FixItNowCustomerConfirmation($serviceRequest));
            }

            $adminEmails = Role::query()
                ->whereIn('slug', ['super_admin', 'teams_admin'])
                ->with('users')
                ->get()
                ->pluck('users')
                ->flatten()
                ->unique('id')
                ->pluck('email')
                ->filter();

            if ($adminEmails->isNotEmpty()) {
                Mail::to($adminEmails)->send(new FixItNowInternalNotification($serviceRequest));
            }
        }

        return response()->json(['received' => true]);
    }

    public function confirmed(Request $request): View
    {
        $serviceRequest = null;
        $eventUuid = $request->query('event');

        if ($eventUuid) {
            $serviceRequest = ServiceRequest::where('calendly_event_uuid', $eventUuid)->first();
        }

        if (! $serviceRequest) {
            $serviceRequest = ServiceRequest::where('path', 'fix_now')->latest()->first();
        }

        return view('fix-now.confirmed', [
            'serviceRequest' => $serviceRequest,
        ]);
    }

    private function isValidSignature(Request $request): bool
    {
        $signatureHeader = $request->header('Calendly-Webhook-Signature');

        if (! $signatureHeader) {
            return false;
        }

        $parts = collect(explode(',', $signatureHeader))
            ->mapWithKeys(function (string $segment) {
                [$key, $value] = array_pad(explode('=', trim($segment), 2), 2, null);

                return [$key => $value];
            });

        $timestamp = $parts->get('t');
        $provided = $parts->get('v1');

        if (! $timestamp || ! $provided) {
            return false;
        }

        $computed = hash_hmac('sha256', $timestamp.'.'.$request->getContent(), config('services.calendly.webhook_secret', ''));

        return hash_equals($computed, $provided);
    }
}
