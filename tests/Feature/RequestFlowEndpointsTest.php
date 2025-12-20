<?php

namespace Tests\Feature;

use App\Models\ServiceRequest;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Mockery;
use Tests\TestCase;

class RequestFlowEndpointsTest extends TestCase
{
    use RefreshDatabase;
    use MockeryPHPUnitIntegration;

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
        $serviceRequest = ServiceRequest::factory()->create([
            'status' => 'started',
        ]);

        $this->postJson("/api/requests/{$serviceRequest->id}/payment-intent")
            ->assertStatus(422)
            ->assertJson([
                'message' => 'Schedule your discovery call first.',
            ]);
    }

    public function test_payment_intent_returns_client_secret_for_scheduled_request(): void
    {
        $serviceRequest = ServiceRequest::factory()->create([
            'status' => 'scheduled',
        ]);

        config(['services.stripe.secret' => 'sk_test_123']);

        $paymentIntents = Mockery::mock();
        $paymentIntents->shouldReceive('create')
            ->once()
            ->andReturn((object) ['id' => 'pi_123', 'client_secret' => 'secret_123']);

        $stripe = Mockery::mock('overload:Stripe\\StripeClient');
        $stripe->shouldReceive('__get')
            ->with('paymentIntents')
            ->andReturn($paymentIntents);

        $this->postJson("/api/requests/{$serviceRequest->id}/payment-intent")
            ->assertOk()
            ->assertJson([
                'client_secret' => 'secret_123',
            ]);
    }

    public function test_payment_intent_reuses_existing_stripe_intent(): void
    {
        $serviceRequest = ServiceRequest::factory()->create([
            'status' => 'scheduled',
            'payment_intent_id' => 'pi_existing',
        ]);

        config(['services.stripe.secret' => 'sk_test_123']);

        $paymentIntents = Mockery::mock();
        $paymentIntents->shouldReceive('retrieve')
            ->once()
            ->with('pi_existing', [])
            ->andReturn((object) ['client_secret' => 'secret_existing']);
        $paymentIntents->shouldReceive('create')->never();

        $stripe = Mockery::mock('overload:Stripe\\StripeClient');
        $stripe->shouldReceive('__get')
            ->with('paymentIntents')
            ->andReturn($paymentIntents);

        $this->postJson("/api/requests/{$serviceRequest->id}/payment-intent")
            ->assertOk()
            ->assertJson([
                'client_secret' => 'secret_existing',
            ]);
    }

    public function test_confirm_payment_returns_success_when_already_paid(): void
    {
        $serviceRequest = ServiceRequest::factory()->create([
            'status' => 'paid',
            'deposit_status' => 'paid',
        ]);

        $stripe = Mockery::mock('overload:Stripe\\StripeClient');
        $stripe->shouldReceive('__construct')->never();

        $this->postJson("/api/requests/{$serviceRequest->id}/confirm-payment", [
            'payment_intent_id' => 'pi_123',
        ])
            ->assertOk()
            ->assertJson([
                'success' => true,
            ]);
    }

    public function test_confirm_payment_rejects_when_not_scheduled(): void
    {
        $serviceRequest = ServiceRequest::factory()->create([
            'status' => 'started',
        ]);

        $this->postJson("/api/requests/{$serviceRequest->id}/confirm-payment", [
            'payment_intent_id' => 'pi_123',
        ])
            ->assertStatus(422)
            ->assertJson([
                'message' => 'Schedule your discovery call first.',
            ]);
    }

    public function test_confirm_payment_rejects_on_metadata_request_id_mismatch(): void
    {
        $serviceRequest = ServiceRequest::factory()->create([
            'status' => 'scheduled',
        ]);

        config(['services.stripe.secret' => 'sk_test_123']);

        $paymentIntents = Mockery::mock();
        $paymentIntents->shouldReceive('retrieve')
            ->once()
            ->with('pi_123', [])
            ->andReturn((object) [
                'id' => 'pi_123',
                'metadata' => ['request_id' => '999'],
                'status' => 'succeeded',
                'amount' => 12900,
                'currency' => 'cad',
            ]);

        $stripe = Mockery::mock('overload:Stripe\\StripeClient');
        $stripe->shouldReceive('__get')
            ->with('paymentIntents')
            ->andReturn($paymentIntents);

        $this->postJson("/api/requests/{$serviceRequest->id}/confirm-payment", [
            'payment_intent_id' => 'pi_123',
        ])
            ->assertStatus(422)
            ->assertJson([
                'message' => 'Payment verification failed.',
            ]);
    }

    public function test_confirm_payment_rejects_when_stripe_status_not_succeeded(): void
    {
        $serviceRequest = ServiceRequest::factory()->create([
            'status' => 'scheduled',
        ]);

        config(['services.stripe.secret' => 'sk_test_123']);

        $paymentIntents = Mockery::mock();
        $paymentIntents->shouldReceive('retrieve')
            ->once()
            ->with('pi_123', [])
            ->andReturn((object) [
                'id' => 'pi_123',
                'metadata' => ['request_id' => (string) $serviceRequest->id],
                'status' => 'requires_payment_method',
                'amount' => 12900,
                'currency' => 'cad',
            ]);

        $stripe = Mockery::mock('overload:Stripe\\StripeClient');
        $stripe->shouldReceive('__get')
            ->with('paymentIntents')
            ->andReturn($paymentIntents);

        $this->postJson("/api/requests/{$serviceRequest->id}/confirm-payment", [
            'payment_intent_id' => 'pi_123',
        ])
            ->assertStatus(422)
            ->assertJson([
                'message' => 'Payment is not completed yet.',
            ]);
    }

    public function test_confirm_payment_rejects_on_amount_or_currency_mismatch(): void
    {
        $serviceRequest = ServiceRequest::factory()->create([
            'status' => 'scheduled',
        ]);

        config(['services.stripe.secret' => 'sk_test_123']);

        $paymentIntents = Mockery::mock();
        $paymentIntents->shouldReceive('retrieve')
            ->once()
            ->with('pi_123', [])
            ->andReturn((object) [
                'id' => 'pi_123',
                'metadata' => ['request_id' => (string) $serviceRequest->id],
                'status' => 'succeeded',
                'amount' => 100,
                'currency' => 'usd',
            ]);

        $stripe = Mockery::mock('overload:Stripe\\StripeClient');
        $stripe->shouldReceive('__get')
            ->with('paymentIntents')
            ->andReturn($paymentIntents);

        $this->postJson("/api/requests/{$serviceRequest->id}/confirm-payment", [
            'payment_intent_id' => 'pi_123',
        ])
            ->assertStatus(422)
            ->assertJson([
                'message' => 'Payment amount mismatch.',
            ]);
    }
}
