<?php

namespace App\Http\Controllers;

use App\Mail\FixItNowCustomerConfirmation;
use App\Mail\FixItNowInternalNotification;
use App\Mail\PlanItProperlyConfirmation;
use App\Models\Role;
use App\Models\ServiceRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class RequestController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['nullable', 'string', 'max:255'],
            'service_category' => ['required', 'string', 'max:255'],
            'service_name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'path' => ['required', 'in:fix_now,plan_properly'],
        ]);

        $serviceRequest = ServiceRequest::create($validated);

        if ($serviceRequest->path === 'fix_now') {
            Mail::to($serviceRequest->email)->send(new FixItNowCustomerConfirmation($serviceRequest));

            $adminEmails = Role::query()
                ->whereIn('slug', ['super_admin', 'teams_admin'])
                ->with('users')
                ->get()
                ->pluck('users')
                ->flatten()
                ->unique('id')
                ->pluck('email')
                ->filter();

            if ($adminEmails->isNotEmpty()) {
                Mail::to($adminEmails)->send(new FixItNowInternalNotification($serviceRequest));
            }
        }

        if ($serviceRequest->path === 'plan_properly') {
            Mail::to($serviceRequest->email)->send(new PlanItProperlyConfirmation($serviceRequest));
        }

        return back()->with('status', 'Thanks! We received your request and will follow up with next steps.');
    }
}
