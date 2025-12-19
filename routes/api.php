<?php

use App\Http\Controllers\Api\RequestController;
use App\Http\Controllers\Api\RequestScheduleController;
use Illuminate\Support\Facades\Route;

Route::post('/requests', [RequestController::class, 'store'])->name('requests.store');
Route::post('/requests/{request}/deposit', [RequestController::class, 'deposit'])->name('requests.deposit');
Route::post('/requests/{request}/scheduled', [RequestScheduleController::class, 'store'])
    ->name('requests.scheduled')
    ->missing(function () {
        return response()->json([
            'success' => false,
            'message' => 'Request not found.',
        ], 404);
    });
