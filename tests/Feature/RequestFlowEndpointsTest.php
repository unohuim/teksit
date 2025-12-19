<?php

namespace Tests\Feature;

use App\Models\ServiceRequest;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RequestFlowEndpointsTest extends TestCase
{
    use RefreshDatabase;

    public function test_request_store_returns_started_status(): void
    {
        $response = $this->postJson('/api/requests', [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'phone' => '555-0100',
            'audience_type' => 'individual',
            'service_category' => 'Consulting',
            'description' => 'Need help with a project.',
        ]);

        $response->assertOk()
            ->assertJsonPath('request.status', 'started');
    }

    public function test_payment_intent_rejects_when_not_scheduled(): void
    {
        $serviceRequest = ServiceRequest::create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'phone' => '555-0100',
            'audience_type' => 'individual',
            'service_category' => 'Consulting',
            'description' => 'Need help with a project.',
            'status' => 'started',
        ]);

        $this->postJson("/api/requests/{$serviceRequest->id}/payment-intent")
            ->assertStatus(422)
            ->assertJson([
                'message' => 'Schedule your discovery call first.',
            ]);
    }
}
