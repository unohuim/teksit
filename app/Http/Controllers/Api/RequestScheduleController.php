<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ServiceRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class RequestScheduleController extends Controller
{
    public function store(Request $request, ServiceRequest $serviceRequest): JsonResponse
    {
        $validated = $request->validate([
            'calendly_event_uri' => ['required', 'string'],
            'calendly_invitee_uri' => ['required', 'string'],
        ]);

        if ($serviceRequest->status === 'scheduled' || $serviceRequest->scheduled_at) {
            // Idempotency: already scheduled, do not overwrite scheduled_at.
            return response()->json([
                'success' => true,
                'status' => $serviceRequest->status,
                'next_step' => 'billing',
            ]);
        }

        if (! in_array($serviceRequest->status, ['started', 'scheduled'], true)) {
            return response()->json([
                'success' => false,
                'message' => 'Request already processed.',
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $response = Http::withToken(config('services.calendly.token'))
            ->get($validated['calendly_event_uri']);

        if (! $response->successful()) {
            return response()->json([
                'error' => 'Unable to fetch Calendly event details',
            ], Response::HTTP_BAD_GATEWAY);
        }

        $event = $response->json();
        $scheduledAt = $event['start_time'] ?? null;

        if (! $scheduledAt) {
            return response()->json([
                'error' => 'Calendly event missing start_time',
            ], Response::HTTP_BAD_GATEWAY);
        }

        $eventUuid = Str::afterLast($validated['calendly_event_uri'], '/');

        $serviceRequest->update([
            'calendly_event_uri' => $validated['calendly_event_uri'],
            'calendly_invitee_uri' => $validated['calendly_invitee_uri'],
            'calendly_event_uuid' => $eventUuid,
            'scheduled_at' => $scheduledAt,
            'status' => 'scheduled',
        ]);

        return response()->json([
            'success' => true,
            'status' => $serviceRequest->status,
            'next_step' => 'billing',
        ]);
    }
}
