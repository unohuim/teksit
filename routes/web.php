<?php

use App\Http\Controllers\CalendlyController;
use App\Http\Controllers\RequestController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');
Route::view('/pricing', 'pricing');
Route::view('/contact', 'requests.flow')->name('contact');
Route::post('/requests/start', [RequestController::class, 'start'])->name('requests.start');
Route::post('/requests/{request}/deposit', [RequestController::class, 'recordDeposit'])->name('requests.deposit');
Route::get('/request/confirmed', [RequestController::class, 'confirmed'])->name('requests.confirmed');

Route::get('/fix-now', [CalendlyController::class, 'showFixNow'])->name('fix-now');
Route::get('/auth/calendly/redirect', [CalendlyController::class, 'redirectToCalendly'])->name('calendly.redirect');
Route::get('/auth/calendly/callback', [CalendlyController::class, 'handleCallback'])->name('calendly.callback');
Route::post('/webhooks/calendly', [CalendlyController::class, 'handleWebhook']);
Route::get('/fix-now/confirmed', [CalendlyController::class, 'confirmed'])->name('fix-now.confirmed');

Route::prefix('services')->group(function () {
    // Individuals
    Route::view('/individuals/fix-it-now', 'services.individuals.fix-it-now');
    Route::view('/individuals/setups', 'services.individuals.setups');
    Route::view('/individuals/wi-fi-and-networkables', 'services.individuals.wi-fi-and-networkables');
    Route::view('/individuals/security-and-passwords', 'services.individuals.security-and-passwords');

    // Professionals
    Route::view('/professionals/brand-launch-support', 'services.professionals.brand-launch-support');
    Route::view('/professionals/migrations', 'services.professionals.migrations');
    Route::view('/professionals/leads-management-and-bookings', 'services.professionals.leads-management-and-bookings');
    Route::view('/professionals/automations-and-efficiency', 'services.professionals.automations-and-efficiency');
    Route::view('/professionals/ai-integrations', 'services.professionals.ai-integrations');

    // Small Teams
    Route::view('/teams/onboarding-support', 'services.teams.onboarding-support');
    Route::view('/teams/cloud-migrations', 'services.teams.cloud-migrations');
    Route::view('/teams/shared-info-and-collaboration', 'services.teams.shared-info-and-collaboration');
    Route::view('/teams/tool-consolidation', 'services.teams.tool-consolidation');
    Route::view('/teams/ai-integrations', 'services.teams.ai-integrations');
    Route::view('/teams/project-concierge', 'services.teams.project-concierge');
});
