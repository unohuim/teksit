<?php

namespace App\Http\Controllers;

use App\Models\ServiceRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class RequestController extends Controller
{
    public function start(Request $request): Response
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['nullable', 'string', 'max:255'],
            'audience_type' => ['required', Rule::in(['individual', 'professional', 'small_team'])],
            'service_category' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
        ]);

        $serviceRequest = ServiceRequest::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'] ?? null,
            'audience_type' => $validated['audience_type'],
            'service_category' => $validated['service_category'],
            'description' => $validated['description'],
            'status' => 'started',
        ]);

        return response(['request' => $serviceRequest], Response::HTTP_CREATED);
    }

    public function storeSchedule(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'request_id' => ['required', 'integer', 'exists:requests,id'],
            'calendly_event_uuid' => ['required', 'string', 'max:255'],
            'scheduled_at' => ['required', 'date'],
        ]);

        $serviceRequest = ServiceRequest::findOrFail($validated['request_id']);

        if (! in_array($serviceRequest->status, ['started', 'scheduled'])) {
            return response()->json(['message' => 'Request already processed.'], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $serviceRequest->calendly_event_uuid = $validated['calendly_event_uuid'];
        $serviceRequest->scheduled_at = $validated['scheduled_at'];
        $serviceRequest->status = 'scheduled';
        $serviceRequest->save();

        return response()->json([
            'success' => true,
            'status' => $serviceRequest->status,
            'request_id' => $serviceRequest->id,
            'next_step' => 'billing',
            'request' => $serviceRequest,
            'message' => 'Discovery call scheduled.',
        ]);
    }

    public function recordDeposit(Request $request, ServiceRequest $serviceRequest): Response
    {
        $request->validate([
            'payment_method' => ['nullable', 'string'],
        ]);

        if ($serviceRequest->status !== 'scheduled') {
            return response(['message' => 'Schedule your discovery call first.'], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $payment = $serviceRequest->payments()->create([
            'amount_cents' => 12900,
            'currency' => 'cad',
            'provider' => 'stripe',
            'status' => 'succeeded',
            'reference' => null,
            'meta' => [
                'note' => 'Discovery deposit',
            ],
        ]);

        $serviceRequest->status = 'paid';
        $serviceRequest->save();

        session(['latest_paid_request_id' => $serviceRequest->id]);

        return response([
            'payment' => $payment,
            'redirect' => route('requests.confirmed'),
        ]);
    }

    public function confirmed(Request $request): RedirectResponse|View
    {
        $requestId = $request->query('request_id') ?? $request->session()->pull('latest_paid_request_id');

        if (! $requestId) {
            return redirect()->route('contact');
        }

        $serviceRequest = ServiceRequest::with('payments')->findOrFail($requestId);

        return view('requests.confirmed', [
            'requestModel' => $serviceRequest,
            'latestPayment' => $serviceRequest->payments()->latest()->first(),
        ]);
    }
}
