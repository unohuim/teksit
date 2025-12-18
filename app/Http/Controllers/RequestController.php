<?php

namespace App\Http\Controllers;

use App\Models\ServiceRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

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

        ServiceRequest::create($validated);

        return back()->with('status', 'Thanks! We received your request and will follow up with next steps.');
    }
}
