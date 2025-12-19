<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ServiceRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\Rule;
use Stripe\Checkout\Session as StripeCheckoutSession;
use Stripe\Exception\ApiErrorException;

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
        if ($serviceRequest->deposit_status === 'paid') {
            return response()->json([
                'message' => 'Deposit already paid.',
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
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
            // Use Stripe-hosted Checkout so card details never touch our backend.
            $session = StripeCheckoutSession::create([
                'mode' => 'payment',
                'currency' => 'cad',
                'success_url' => url("/contact?request={$serviceRequest->id}&paid=1"),
                'cancel_url' => url("/contact?request={$serviceRequest->id}"),
                'line_items' => [
                    [
                        'quantity' => 1,
                        'price_data' => [
                            'currency' => 'cad',
                            'unit_amount' => 12900,
                            'product_data' => [
                                'name' => 'HappyTek Discovery Deposit',
                            ],
                        ],
                    ],
                ],
                'metadata' => [
                    'request_id' => (string) $serviceRequest->id,
                    'email' => (string) $serviceRequest->email,
                ],
                'customer_email' => $serviceRequest->email,
            ], [
                'api_key' => $secret,
            ]);
        } catch (ApiErrorException $exception) {
            return response()->json([
                'message' => 'Unable to start Stripe Checkout.',
            ], Response::HTTP_BAD_GATEWAY);
        }

        $serviceRequest->forceFill([
            'stripe_checkout_session_id' => $session->id,
            'deposit_status' => 'pending',
        ])->save();

        return response()->json([
            'checkout_url' => $session->url,
        ]);
    }
}
