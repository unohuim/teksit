<?php

use App\Models\ServiceRequest;
use Carbon\Carbon;

function makeModelRequest(array $overrides = []): ServiceRequest
{
    return ServiceRequest::create(array_merge([
        'name' => 'Test User',
        'email' => 'test@example.com',
        'phone' => '555-0100',
        'audience_type' => 'individual',
        'service_category' => 'Consulting',
        'description' => 'Need help with a project.',
        'status' => 'started',
    ], $overrides));
}

it('reloads scheduled requests without changing scheduled data', function () {
    // This ensures scheduled requests remain stable when reloaded.
    $scheduledAt = Carbon::parse('2025-12-22T10:00:00Z');
    $serviceRequest = makeModelRequest([
        'status' => 'scheduled',
        'calendly_event_uuid' => 'abc123',
        'calendly_event_uri' => 'https://api.calendly.com/scheduled_events/abc123',
        'calendly_invitee_uri' => 'https://api.calendly.com/scheduled_events/abc123/invitees/def456',
        'scheduled_at' => $scheduledAt,
    ]);

    $serviceRequest->refresh();

    expect($serviceRequest->status)->toBe('scheduled');
    expect($serviceRequest->scheduled_at?->toIso8601String())->toBe($scheduledAt->toIso8601String());
    expect($serviceRequest->calendly_event_uuid)->toBe('abc123');
});

it('reloads paid requests without changing paid status', function () {
    // This ensures paid requests remain stable when reloaded.
    $serviceRequest = makeModelRequest([
        'status' => 'paid',
        'calendly_event_uuid' => 'abc123',
    ]);

    $serviceRequest->refresh();

    expect($serviceRequest->status)->toBe('paid');
    expect($serviceRequest->calendly_event_uuid)->toBe('abc123');
});
