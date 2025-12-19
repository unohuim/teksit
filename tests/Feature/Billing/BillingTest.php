<?php

use App\Models\ServiceRequest;

function makeBillingRequest(array $overrides = []): ServiceRequest
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

it('rejects billing before scheduling', function () {
    // This ensures deposits cannot be paid before scheduling.
    $serviceRequest = makeBillingRequest();

    $this->postJson("/api/requests/{$serviceRequest->id}/deposit")
        ->assertStatus(422)
        ->assertJson(['message' => 'Schedule your discovery call first.']);
});

it('accepts billing after scheduling', function () {
    // This verifies the deposit flow once scheduling is complete.
    $serviceRequest = makeBillingRequest(['status' => 'scheduled']);

    $response = $this->postJson("/api/requests/{$serviceRequest->id}/deposit");

    $response->assertOk()
        ->assertJsonPath('payment.amount_cents', 12900)
        ->assertJsonPath('redirect', route('requests.confirmed'));
});

it('transitions scheduled requests to paid after billing', function () {
    // This locks the scheduled -> paid transition.
    $serviceRequest = makeBillingRequest(['status' => 'scheduled']);

    $this->postJson("/api/requests/{$serviceRequest->id}/deposit")
        ->assertOk();

    $serviceRequest->refresh();
    expect($serviceRequest->status)->toBe('paid');
    $this->assertDatabaseCount('payments', 1);
});

it('rejects duplicate billing attempts', function () {
    // This protects against charging a deposit twice.
    $serviceRequest = makeBillingRequest(['status' => 'scheduled']);

    $this->postJson("/api/requests/{$serviceRequest->id}/deposit")
        ->assertOk();

    $serviceRequest->refresh();
    expect($serviceRequest->status)->toBe('paid');

    $this->postJson("/api/requests/{$serviceRequest->id}/deposit")
        ->assertStatus(422);

    $this->assertDatabaseCount('payments', 1);
});
