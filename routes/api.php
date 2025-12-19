<?php

use App\Http\Controllers\RequestController;
use Illuminate\Support\Facades\Route;

Route::post('/requests/schedule', [RequestController::class, 'storeSchedule'])->name('requests.schedule');
