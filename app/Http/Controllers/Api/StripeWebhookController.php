<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ServiceRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use Stripe\Webhook;
use Stripe\Exception\SignatureVerificationException;

class StripeWebhookController extends Controller
{
    public function handle(Request $request): JsonResponse
    {
        $signature = $request->header('Stripe-Signature');
        $secret = config('services.stripe.webhook_secret');

        if (! $signature || ! $secret) {
            return response()->json(['message' => 'Missing webhook signature.'], Response::HTTP_BAD_REQUEST);
        }

        try {
            $event = Webhook::constructEvent($request->getContent(), $signature, $secret);
        } catch (SignatureVerificationException $exception) {
            return response()->json(['message' => 'Invalid webhook signature.'], Response::HTTP_BAD_REQUEST);
        } catch (\UnexpectedValueException $exception) {
            return response()->json(['message' => 'Invalid webhook payload.'], Response::HTTP_BAD_REQUEST);
        }

        if ($event->type === 'payment_intent.succeeded') {
            $intent = $event->data->object;
            $paymentIntentId = $intent->id ?? null;
            $requestId = $intent->metadata->request_id ?? null;

            $serviceRequest = null;

            if ($paymentIntentId) {
                $serviceRequest = ServiceRequest::where('payment_intent_id', $paymentIntentId)->first();
            }

            if (! $serviceRequest && $requestId) {
                $serviceRequest = ServiceRequest::find($requestId);
            }

            if (! $serviceRequest) {
                Log::warning('Stripe payment intent succeeded without matching request.', [
                    'payment_intent_id' => $paymentIntentId,
                    'request_id' => $requestId,
                ]);

                return response()->json(['ignored' => true], Response::HTTP_ACCEPTED);
            }

            if ($serviceRequest->deposit_status === 'paid') {
                return response()->json(['received' => true]);
            }

            $serviceRequest->forceFill([
                'payment_intent_id' => $paymentIntentId,
                'deposit_status' => 'paid',
                'deposit_paid_at' => now(),
                'paid_at' => now(),
                'status' => 'paid',
            ])->save();

            return response()->json(['received' => true]);
        }

        if ($event->type !== 'checkout.session.completed') {
            return response()->json(['ignored' => true]);
        }

        $session = $event->data->object;
        $sessionId = $session->id ?? null;
        $requestId = $session->metadata->request_id ?? null;

        $serviceRequest = null;

        if ($sessionId) {
            $serviceRequest = ServiceRequest::where('stripe_checkout_session_id', $sessionId)->first();
        }

        if (! $serviceRequest && $requestId) {
            $serviceRequest = ServiceRequest::find($requestId);
        }

        if (! $serviceRequest) {
            Log::warning('Stripe checkout session completed without matching request.', [
                'session_id' => $sessionId,
                'request_id' => $requestId,
            ]);

            return response()->json(['ignored' => true], Response::HTTP_ACCEPTED);
        }

        if (($session->payment_status ?? null) !== 'paid') {
            return response()->json(['ignored' => true], Response::HTTP_ACCEPTED);
        }

        if ($serviceRequest->deposit_status === 'paid') {
            // Ignore repeated webhook deliveries once the deposit is confirmed.
            return response()->json(['received' => true]);
        }

        $serviceRequest->forceFill([
            'deposit_status' => 'paid',
            'deposit_paid_at' => now(),
            'paid_at' => now(),
            'status' => 'paid',
        ])->save();

        return response()->json(['received' => true]);
    }
}
