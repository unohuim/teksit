<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RequestSchedulingTest extends TestCase
{
    use RefreshDatabase;

    public function test_scheduled_at_is_optional_on_create_and_required_on_schedule(): void
    {
        $response = $this->postJson('/api/requests', [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'phone' => '555-0100',
            'audience_type' => 'individual',
            'service_category' => 'Consulting',
            'description' => 'Need help with a project.',
        ]);

        $response->assertStatus(200);

        $requestId = $response->json('request.id');

        $this->postJson("/api/requests/{$requestId}/scheduled", [])
            ->assertStatus(422);
    }
}
