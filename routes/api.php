<?php

use App\Http\Controllers\Api\RequestScheduleController;
use Illuminate\Support\Facades\Route;

Route::post('/requests/schedule', [RequestScheduleController::class, 'store'])->name('requests.schedule');
