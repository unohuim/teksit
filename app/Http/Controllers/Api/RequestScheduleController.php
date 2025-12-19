<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ServiceRequest;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class RequestScheduleController extends Controller
{
    public function store(Request $request, ServiceRequest $serviceRequest): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'calendly_event_uri' => ['required', 'string'],
            'calendly_invitee_uri' => ['required', 'string'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed.',
                'errors' => $validator->errors(),
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $validated = $validator->validated();
        $eventUuid = Str::afterLast($validated['calendly_event_uri'], '/');

        if ($serviceRequest->status === 'scheduled') {
            return response()->json([
                'success' => true,
                'status' => $serviceRequest->status,
                'next_step' => 'billing',
            ]);
        }

        if (! in_array($serviceRequest->status, ['started', 'scheduled'], true)) {
            return response()->json([
                'success' => true,
                'status' => $serviceRequest->status,
                'next_step' => $serviceRequest->status === 'scheduled' ? 'billing' : null,
            ]);
        }

        if ($serviceRequest->calendly_event_uuid && $serviceRequest->calendly_event_uuid === $eventUuid) {
            return response()->json([
                'success' => true,
                'status' => $serviceRequest->status,
                'next_step' => 'billing',
            ]);
        }

        $scheduledAt = Carbon::now();

        try {
            $response = Http::withToken(config('services.calendly.token'))
                ->get($validated['calendly_event_uri']);

            if ($response->successful()) {
                $event = $response->json();
                $startTime = $event['start_time'] ?? null;

                if ($startTime) {
                    $scheduledAt = Carbon::parse($startTime);
                } else {
                    Log::warning('Calendly event missing start_time', [
                        'request_id' => $serviceRequest->id,
                        'calendly_event_uri' => $validated['calendly_event_uri'],
                    ]);
                }
            } else {
                Log::warning('Unable to fetch Calendly event details', [
                    'request_id' => $serviceRequest->id,
                    'calendly_event_uri' => $validated['calendly_event_uri'],
                    'status' => $response->status(),
                    'body' => $response->body(),
                ]);
            }
        } catch (\Throwable $exception) {
            Log::warning('Calendly fetch failed', [
                'request_id' => $serviceRequest->id,
                'calendly_event_uri' => $validated['calendly_event_uri'],
                'error' => $exception->getMessage(),
            ]);
        }

        $serviceRequest->update([
            'calendly_event_uri' => $validated['calendly_event_uri'],
            'calendly_invitee_uri' => $validated['calendly_invitee_uri'],
            'calendly_event_uuid' => $eventUuid,
            'scheduled_at' => $scheduledAt,
            'status' => 'scheduled',
        ]);

        if ($serviceRequest->email) {
            try {
                Mail::raw(
                    'Thanks for scheduling your discovery call with HappyTek. We will see you soon.',
                    fn ($message) => $message
                        ->to($serviceRequest->email)
                        ->subject('Your discovery call is scheduled')
                );
            } catch (\Throwable $exception) {
                Log::error('Failed to send scheduling email', [
                    'request_id' => $serviceRequest->id,
                    'error' => $exception->getMessage(),
                ]);
            }
        }

        return response()->json([
            'success' => true,
            'status' => $serviceRequest->status,
            'next_step' => 'billing',
        ]);
    }
}
