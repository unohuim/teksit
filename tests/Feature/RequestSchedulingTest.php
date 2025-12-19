<?php

namespace Tests\Feature;

use App\Models\ServiceRequest;
use Illuminate\Support\Facades\Http;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RequestSchedulingTest extends TestCase
{
    use RefreshDatabase;

    public function test_scheduled_endpoint_returns_json_validation_errors(): void
    {
        $response = $this->postJson('/api/requests', [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'phone' => '555-0100',
            'audience_type' => 'individual',
            'service_category' => 'Consulting',
            'description' => 'Need help with a project.',
        ]);

        $response->assertOk();

        $requestId = $response->json('request.id');

        $this->postJson("/api/requests/{$requestId}/scheduled", [])
            ->assertStatus(422)
            ->assertJsonValidationErrors(['calendly_event_uri', 'calendly_invitee_uri']);
    }

    public function test_scheduled_endpoint_fetches_calendly_event_and_sets_scheduled_at(): void
    {
        Http::fake([
            'https://api.calendly.com/scheduled_events/abc123' => Http::response([
                'start_time' => '2025-12-22T10:00:00Z',
            ], 200),
        ]);

        $response = $this->postJson('/api/requests', [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'phone' => '555-0100',
            'audience_type' => 'individual',
            'service_category' => 'Consulting',
            'description' => 'Need help with a project.',
        ]);

        $response->assertOk();

        $requestId = $response->json('request.id');

        $response = $this->postJson("/api/requests/{$requestId}/scheduled", [
            'calendly_event_uri' => 'https://api.calendly.com/scheduled_events/abc123',
            'calendly_invitee_uri' => 'https://api.calendly.com/scheduled_events/abc123/invitees/def456',
        ])
            ->assertOk()
            ->assertJson([
                'success' => true,
                'status' => 'scheduled',
                'next_step' => 'billing',
            ]);

        $contentType = $response->headers->get('Content-Type', '');
        $this->assertTrue(str_contains($contentType, 'application/json'));

        $serviceRequest = ServiceRequest::findOrFail($requestId);
        $this->assertSame('scheduled', $serviceRequest->status);
        $this->assertSame('2025-12-22 10:00:00', $serviceRequest->scheduled_at?->format('Y-m-d H:i:s'));

        Http::assertSent(function ($request) {
            return $request->url() === 'https://api.calendly.com/scheduled_events/abc123';
        });
    }

    public function test_scheduled_endpoint_ignores_client_scheduled_at_input(): void
    {
        Http::fake([
            'https://api.calendly.com/scheduled_events/abc123' => Http::response([
                'start_time' => '2025-12-22T10:00:00Z',
            ], 200),
        ]);

        $response = $this->postJson('/api/requests', [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'phone' => '555-0100',
            'audience_type' => 'individual',
            'service_category' => 'Consulting',
            'description' => 'Need help with a project.',
        ]);

        $response->assertOk();

        $requestId = $response->json('request.id');

        $this->postJson("/api/requests/{$requestId}/scheduled", [
            'calendly_event_uri' => 'https://api.calendly.com/scheduled_events/abc123',
            'calendly_invitee_uri' => 'https://api.calendly.com/scheduled_events/abc123/invitees/def456',
            'scheduled_at' => '1999-01-01T00:00:00Z',
        ])
            ->assertOk()
            ->assertJson([
                'success' => true,
                'status' => 'scheduled',
            ]);

        $serviceRequest = ServiceRequest::findOrFail($requestId);
        $this->assertSame('2025-12-22 10:00:00', $serviceRequest->scheduled_at?->format('Y-m-d H:i:s'));
    }

    public function test_scheduled_endpoint_is_idempotent_for_duplicate_events(): void
    {
        Http::fake([
            'https://api.calendly.com/scheduled_events/abc123' => Http::response([
                'start_time' => '2025-12-22T10:00:00Z',
            ], 200),
        ]);

        $response = $this->postJson('/api/requests', [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'phone' => '555-0100',
            'audience_type' => 'individual',
            'service_category' => 'Consulting',
            'description' => 'Need help with a project.',
        ]);

        $response->assertOk();

        $requestId = $response->json('request.id');

        $payload = [
            'calendly_event_uri' => 'https://api.calendly.com/scheduled_events/abc123',
            'calendly_invitee_uri' => 'https://api.calendly.com/scheduled_events/abc123/invitees/def456',
        ];

        $this->postJson("/api/requests/{$requestId}/scheduled", $payload)
            ->assertOk()
            ->assertJson([
                'success' => true,
                'status' => 'scheduled',
            ]);

        $this->postJson("/api/requests/{$requestId}/scheduled", $payload)
            ->assertOk()
            ->assertJson([
                'success' => true,
                'status' => 'scheduled',
            ]);

        Http::assertSentCount(1);
    }
}
