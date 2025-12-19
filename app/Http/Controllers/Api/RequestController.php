<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ServiceRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\Rule;

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
        $request->validate([
            'payment_method' => ['nullable', 'string'],
        ]);

        if ($serviceRequest->status !== 'scheduled') {
            return response()->json([
                'message' => 'Schedule your discovery call first.',
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
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

        return response()->json([
            'payment' => $payment,
            'redirect' => route('requests.confirmed'),
        ]);
    }
}
