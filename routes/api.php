<?php

use App\Http\Controllers\Api\RequestController;
use App\Http\Controllers\Api\RequestScheduleController;
use App\Http\Controllers\Api\StripeWebhookController;
use Illuminate\Support\Facades\Route;

Route::post('/requests', [RequestController::class, 'store'])->name('requests.store');
Route::post('/requests/{request}/deposit', [RequestController::class, 'deposit'])->name('requests.deposit');
Route::post('/webhooks/stripe', [StripeWebhookController::class, 'handle'])->name('webhooks.stripe');
Route::post('/requests/{serviceRequest}/scheduled', [RequestScheduleController::class, 'store'])
    ->name('requests.scheduled')
    ->missing(function () {
        return response()->json([
            'success' => false,
            'message' => 'Request not found.',
        ], 404);
    });
