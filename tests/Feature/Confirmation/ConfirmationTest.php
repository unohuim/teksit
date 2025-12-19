<?php

use App\Models\Payment;
use App\Models\ServiceRequest;

function makeConfirmedRequest(array $overrides = []): ServiceRequest
{
    return ServiceRequest::create(array_merge([
        'name' => 'Test User',
        'email' => 'test@example.com',
        'phone' => '555-0100',
        'audience_type' => 'individual',
        'service_category' => 'Consulting',
        'description' => 'Need help with a project.',
        'status' => 'paid',
    ], $overrides));
}

it('renders the confirmation page for a valid request', function () {
    // This confirms the paid request confirmation page is reachable.
    $serviceRequest = makeConfirmedRequest();
    $payment = Payment::create([
        'request_id' => $serviceRequest->id,
        'amount_cents' => 12900,
        'currency' => 'cad',
        'provider' => 'stripe',
        'status' => 'succeeded',
        'reference' => null,
        'meta' => ['note' => 'Discovery deposit'],
    ]);

    $response = $this->get(route('requests.confirmed', ['request_id' => $serviceRequest->id]));

    $response->assertOk()
        ->assertViewHas('requestModel', fn (ServiceRequest $model) => $model->is($serviceRequest))
        ->assertViewHas('latestPayment', fn (Payment $model) => $model->is($payment));
});

it('redirects to contact when confirmation request is missing', function () {
    // This prevents a blank confirmation page when no request is present.
    $this->get(route('requests.confirmed'))
        ->assertRedirect(route('contact'));
});
