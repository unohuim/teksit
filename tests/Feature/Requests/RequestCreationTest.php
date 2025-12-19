<?php

it('creates a request with started status', function () {
    // This locks the initial status for the request intake step.
    $payload = [
        'name' => 'Test User',
        'email' => 'test@example.com',
        'phone' => '555-0100',
        'audience_type' => 'individual',
        'service_category' => 'Consulting',
        'description' => 'Need help with a project.',
    ];

    $response = $this->postJson('/api/requests', $payload);

    $response->assertOk()
        ->assertJsonPath('request.status', 'started');

    $this->assertDatabaseHas('requests', [
        'email' => 'test@example.com',
        'status' => 'started',
    ]);
});

it('rejects missing required fields', function () {
    // This prevents incomplete submissions from entering the flow.
    $response = $this->postJson('/api/requests', [
        'name' => '',
        'email' => '',
        'audience_type' => '',
        'service_category' => '',
        'description' => '',
    ]);

    $response->assertStatus(422)
        ->assertJsonValidationErrors([
            'name',
            'email',
            'audience_type',
            'service_category',
            'description',
        ]);
});

it('enforces audience type validation', function () {
    // This ensures only supported audience segments are accepted.
    $response = $this->postJson('/api/requests', [
        'name' => 'Test User',
        'email' => 'test@example.com',
        'phone' => '555-0100',
        'audience_type' => 'enterprise',
        'service_category' => 'Consulting',
        'description' => 'Need help with a project.',
    ]);

    $response->assertStatus(422)
        ->assertJsonValidationErrors(['audience_type']);
});
