<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ServiceRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
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
            'scheduled_at' => ['nullable', 'date'],
        ]);

        $serviceRequest = ServiceRequest::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'] ?? null,
            'audience_type' => $validated['audience_type'],
            'service_category' => $validated['service_category'],
            'description' => $validated['description'],
            'scheduled_at' => $validated['scheduled_at'] ?? null,
            'status' => 'started',
        ]);

        return response()->json(['request' => $serviceRequest]);
    }
}
