<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ServiceRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\Rule;
use Stripe\Exception\ApiErrorException;
use Stripe\StripeClient;

class RequestController extends Controller
{
    public function store(Request $request): JsonResponse
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

        return response()->json(['request' => $serviceRequest]);
    }

    public function deposit(Request $request, ServiceRequest $serviceRequest): JsonResponse
    {
        return $this->paymentIntent($request, $serviceRequest);
    }

    public function paymentIntent(Request $request, ServiceRequest $serviceRequest): JsonResponse
    {
        $serviceRequest = ServiceRequest::query()->findOrFail($serviceRequest->id);

        if ($serviceRequest->status !== 'scheduled') {
            return response()->json([
                'message' => 'Schedule your discovery call first.',
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $secret = config('services.stripe.secret');

        if (! $secret) {
            return response()->json([
                'message' => 'Stripe is not configured.',
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        try {
            $stripe = new StripeClient($secret);

            if ($serviceRequest->payment_intent_id) {
                $existingIntent = $stripe->paymentIntents->retrieve($serviceRequest->payment_intent_id, []);

                if ($existingIntent->client_secret) {
                    return response()->json([
                        'client_secret' => $existingIntent->client_secret,
                    ]);
                }
            }

            $intent = $stripe->paymentIntents->create([
                'amount' => 12900,
                'currency' => 'cad',
                'automatic_payment_methods' => [
                    'enabled' => true,
                ],
                'description' => 'HappyTek Discovery Deposit',
                'metadata' => [
                    'request_id' => (string) $serviceRequest->id,
                    'email' => (string) $serviceRequest->email,
                ],
                'receipt_email' => $serviceRequest->email,
            ]);
        } catch (ApiErrorException $exception) {
            return response()->json([
                'message' => 'Unable to start Stripe payment.',
            ], Response::HTTP_BAD_GATEWAY);
        }

        $serviceRequest->forceFill([
            'payment_intent_id' => $intent->id,
            'deposit_status' => 'pending',
        ])->save();

        return response()->json([
            'client_secret' => $intent->client_secret,
        ]);
    }

    public function confirmPayment(Request $request, ServiceRequest $serviceRequest): JsonResponse
    {
        $validated = $request->validate([
            'payment_intent_id' => ['required', 'string'],
        ]);

        if ($serviceRequest->deposit_status === 'paid') {
            return response()->json([
                'success' => true,
            ]);
        }

        if ($serviceRequest->status !== 'scheduled') {
            return response()->json([
                'message' => 'Schedule your discovery call first.',
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $secret = config('services.stripe.secret');

        if (! $secret) {
            return response()->json([
                'message' => 'Stripe is not configured.',
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        try {
            $stripe = new StripeClient($secret);
            $intent = $stripe->paymentIntents->retrieve($validated['payment_intent_id'], []);
        } catch (ApiErrorException $exception) {
            return response()->json([
                'message' => 'Unable to verify Stripe payment.',
            ], Response::HTTP_BAD_GATEWAY);
        }

        $intentMetadata = (array) ($intent->metadata ?? []);
        $intentRequestId = $intentMetadata['request_id'] ?? null;

        if ((string) $serviceRequest->id !== (string) $intentRequestId) {
            return response()->json([
                'message' => 'Payment verification failed.',
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        if (($intent->status ?? null) !== 'succeeded') {
            return response()->json([
                'message' => 'Payment is not completed yet.',
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        if ((int) $intent->amount !== 12900 || ($intent->currency ?? null) !== 'cad') {
            return response()->json([
                'message' => 'Payment amount mismatch.',
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $serviceRequest->forceFill([
            'payment_intent_id' => $intent->id,
            'deposit_status' => 'paid',
            'deposit_paid_at' => now(),
            'paid_at' => now(),
            'status' => 'paid',
        ])->save();

        return response()->json([
            'success' => true,
            'request' => $serviceRequest,
        ]);
    }
}
