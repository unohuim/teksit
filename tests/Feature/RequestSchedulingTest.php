<?php

namespace Tests\Feature;

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
            ->assertJsonValidationErrors(['scheduled_at', 'calendly_event_uri']);
    }

    public function test_scheduled_endpoint_accepts_iso8601_and_returns_json(): void
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

        $this->postJson("/api/requests/{$requestId}/scheduled", [
            'scheduled_at' => '2025-12-22T10:00:00Z',
            'calendly_event_uri' => 'https://api.calendly.com/scheduled_events/abc123',
        ])
            ->assertOk()
            ->assertJson([
                'success' => true,
                'status' => 'scheduled',
                'next_step' => 'billing',
            ])
            ->assertJsonStructure([
                'success',
                'status',
                'next_step',
                'request_id',
                'request',
                'message',
            ]);
    }
}
