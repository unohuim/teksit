<?php

use App\Models\ServiceRequest;
use Illuminate\Mail\SentMessage;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;

function makeServiceRequest(array $overrides = []): ServiceRequest
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

it('persists scheduling and transitions started to scheduled', function () {
    // This locks the core scheduling transition and scheduled_at behavior.
    Http::fake([
        'https://api.calendly.com/scheduled_events/abc123' => Http::response([
            'start_time' => '2025-12-22T10:00:00Z',
        ]),
    ]);

    $serviceRequest = makeServiceRequest();

    $response = $this->postJson("/api/requests/{$serviceRequest->id}/scheduled", [
        'calendly_event_uri' => 'https://api.calendly.com/scheduled_events/abc123',
        'calendly_invitee_uri' => 'https://api.calendly.com/scheduled_events/abc123/invitees/def456',
    ]);

    $response->assertOk()
        ->assertJson([
            'success' => true,
            'status' => 'scheduled',
            'next_step' => 'billing',
        ]);

    $serviceRequest->refresh();

    expect($serviceRequest->status)->toBe('scheduled');
    expect($serviceRequest->scheduled_at?->format('Y-m-d H:i:s'))->toBe('2025-12-22 10:00:00');
});

it('returns success for duplicate scheduling posts (idempotent)', function () {
    // This guards against duplicate Calendly events firing.
    Http::fake([
        'https://api.calendly.com/scheduled_events/abc123' => Http::response([
            'start_time' => '2025-12-22T10:00:00Z',
        ]),
    ]);

    $serviceRequest = makeServiceRequest();
    $payload = [
        'calendly_event_uri' => 'https://api.calendly.com/scheduled_events/abc123',
        'calendly_invitee_uri' => 'https://api.calendly.com/scheduled_events/abc123/invitees/def456',
    ];

    $this->postJson("/api/requests/{$serviceRequest->id}/scheduled", $payload)
        ->assertOk();

    $this->postJson("/api/requests/{$serviceRequest->id}/scheduled", $payload)
        ->assertOk()
        ->assertJson(['success' => true, 'status' => 'scheduled']);

    Http::assertSentCount(1);
});

it('rejects scheduling without required calendly uris', function () {
    // This enforces the backend/frontend contract for Calendly payloads.
    $serviceRequest = makeServiceRequest();

    $this->postJson("/api/requests/{$serviceRequest->id}/scheduled", [])
        ->assertStatus(422)
        ->assertJsonValidationErrors(['calendly_event_uri', 'calendly_invitee_uri']);
});

it('rejects scheduling on completed requests', function () {
    // This prevents scheduling after the request has fully completed.
    $serviceRequest = makeServiceRequest(['status' => 'completed']);

    $this->postJson("/api/requests/{$serviceRequest->id}/scheduled", [
        'calendly_event_uri' => 'https://api.calendly.com/scheduled_events/abc123',
        'calendly_invitee_uri' => 'https://api.calendly.com/scheduled_events/abc123/invitees/def456',
    ])
        ->assertStatus(422);
});

it('does not regress state on repeat scheduling for scheduled requests', function () {
    // This keeps the request stuck in scheduled instead of resetting.
    $serviceRequest = makeServiceRequest([
        'status' => 'scheduled',
        'calendly_event_uuid' => 'abc123',
        'calendly_event_uri' => 'https://api.calendly.com/scheduled_events/abc123',
        'calendly_invitee_uri' => 'https://api.calendly.com/scheduled_events/abc123/invitees/def456',
    ]);

    $this->postJson("/api/requests/{$serviceRequest->id}/scheduled", [
        'calendly_event_uri' => 'https://api.calendly.com/scheduled_events/abc123',
        'calendly_invitee_uri' => 'https://api.calendly.com/scheduled_events/abc123/invitees/def456',
    ])
        ->assertOk()
        ->assertJson(['status' => 'scheduled']);

    $serviceRequest->refresh();
    expect($serviceRequest->status)->toBe('scheduled');
});

it('sets scheduled_at when calendly api fails', function () {
    // This ensures scheduling still completes if Calendly API is down.
    Http::fake([
        'https://api.calendly.com/scheduled_events/abc123' => Http::response([], 500),
    ]);

    $serviceRequest = makeServiceRequest();

    $this->postJson("/api/requests/{$serviceRequest->id}/scheduled", [
        'calendly_event_uri' => 'https://api.calendly.com/scheduled_events/abc123',
        'calendly_invitee_uri' => 'https://api.calendly.com/scheduled_events/abc123/invitees/def456',
    ])->assertOk();

    $serviceRequest->refresh();
    expect($serviceRequest->scheduled_at)->not->toBeNull();
});

it('does not overwrite existing calendly data on duplicate scheduling', function () {
    // This protects against duplicate events overwriting stored URIs.
    Http::fake([
        'https://api.calendly.com/scheduled_events/abc123' => Http::response([
            'start_time' => '2025-12-22T10:00:00Z',
        ]),
        'https://api.calendly.com/scheduled_events/xyz999' => Http::response([
            'start_time' => '2025-12-23T10:00:00Z',
        ]),
    ]);

    $serviceRequest = makeServiceRequest();

    $this->postJson("/api/requests/{$serviceRequest->id}/scheduled", [
        'calendly_event_uri' => 'https://api.calendly.com/scheduled_events/abc123',
        'calendly_invitee_uri' => 'https://api.calendly.com/scheduled_events/abc123/invitees/def456',
    ])->assertOk();

    $this->postJson("/api/requests/{$serviceRequest->id}/scheduled", [
        'calendly_event_uri' => 'https://api.calendly.com/scheduled_events/xyz999',
        'calendly_invitee_uri' => 'https://api.calendly.com/scheduled_events/xyz999/invitees/def999',
    ])->assertOk();

    $serviceRequest->refresh();
    expect($serviceRequest->calendly_event_uri)->toBe('https://api.calendly.com/scheduled_events/abc123');
    expect($serviceRequest->calendly_invitee_uri)->toBe('https://api.calendly.com/scheduled_events/abc123/invitees/def456');
});

it('sends a scheduling email when scheduling succeeds', function () {
    // This verifies the scheduling confirmation email is triggered.
    Mail::fake();
    Http::fake([
        'https://api.calendly.com/scheduled_events/abc123' => Http::response([
            'start_time' => '2025-12-22T10:00:00Z',
        ]),
    ]);

    $serviceRequest = makeServiceRequest();

    $this->postJson("/api/requests/{$serviceRequest->id}/scheduled", [
        'calendly_event_uri' => 'https://api.calendly.com/scheduled_events/abc123',
        'calendly_invitee_uri' => 'https://api.calendly.com/scheduled_events/abc123/invitees/def456',
    ])->assertOk();

    Mail::assertSent(function (SentMessage $message) {
        return $message->hasTo('test@example.com');
    });
});

it('continues scheduling when email sending fails', function () {
    // This ensures email issues never block scheduling progression.
    Mail::shouldReceive('raw')->once()->andThrow(new RuntimeException('mail down'));
    Http::fake([
        'https://api.calendly.com/scheduled_events/abc123' => Http::response([
            'start_time' => '2025-12-22T10:00:00Z',
        ]),
    ]);

    $serviceRequest = makeServiceRequest();

    $this->postJson("/api/requests/{$serviceRequest->id}/scheduled", [
        'calendly_event_uri' => 'https://api.calendly.com/scheduled_events/abc123',
        'calendly_invitee_uri' => 'https://api.calendly.com/scheduled_events/abc123/invitees/def456',
    ])
        ->assertOk()
        ->assertJson(['status' => 'scheduled']);
});

it('treats duplicate calendly_event_uuid as a no-op', function () {
    // This guards against duplicated Calendly payloads with the same UUID means safe no-op.
    $serviceRequest = makeServiceRequest([
        'calendly_event_uuid' => 'abc123',
    ]);

    $this->postJson("/api/requests/{$serviceRequest->id}/scheduled", [
        'calendly_event_uri' => 'https://api.calendly.com/scheduled_events/abc123',
        'calendly_invitee_uri' => 'https://api.calendly.com/scheduled_events/abc123/invitees/def456',
    ])
        ->assertOk()
        ->assertJson(['success' => true]);

    $serviceRequest->refresh();
    expect($serviceRequest->status)->toBe('started');
});

it('returns success without mutation when scheduling is replayed after payment', function () {
    // This ensures a paid request does not mutate on replayed scheduling events.
    $serviceRequest = makeServiceRequest([
        'status' => 'paid',
        'calendly_event_uuid' => 'abc123',
        'calendly_event_uri' => 'https://api.calendly.com/scheduled_events/abc123',
        'calendly_invitee_uri' => 'https://api.calendly.com/scheduled_events/abc123/invitees/def456',
    ]);

    $this->postJson("/api/requests/{$serviceRequest->id}/scheduled", [
        'calendly_event_uri' => 'https://api.calendly.com/scheduled_events/xyz999',
        'calendly_invitee_uri' => 'https://api.calendly.com/scheduled_events/xyz999/invitees/def999',
    ])
        ->assertOk()
        ->assertJson(['status' => 'paid']);

    $serviceRequest->refresh();
    expect($serviceRequest->calendly_event_uri)->toBe('https://api.calendly.com/scheduled_events/abc123');
    expect($serviceRequest->status)->toBe('paid');
});

it('returns a clear validation error for payload mismatches', function () {
    // This catches frontend/backend contract mismatches early.
    $serviceRequest = makeServiceRequest();

    $this->postJson("/api/requests/{$serviceRequest->id}/scheduled", [
        'calendly_event_url' => 'https://api.calendly.com/scheduled_events/abc123',
    ])
        ->assertStatus(422)
        ->assertJson([
            'success' => false,
            'message' => 'Validation failed.',
        ])
        ->assertJsonValidationErrors(['calendly_event_uri', 'calendly_invitee_uri']);
});
