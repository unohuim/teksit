<?php

namespace App\Http\Controllers;

use App\Mail\PlanItProperlyConfirmation;
use App\Mail\PlanItProperlyInternalNotification;
use App\Models\Role;
use App\Models\ServiceRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;

class RequestController extends Controller
{
    public function storeDraft(Request $request): Response
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['nullable', 'string', 'max:255'],
            'audience_type' => ['required', Rule::in(['Individual', 'Professional', 'Small Team'])],
            'service_name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
        ]);

        $serviceRequest = ServiceRequest::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'] ?? null,
            'audience_type' => $validated['audience_type'],
            'service_category' => $validated['audience_type'],
            'service_name' => $validated['service_name'],
            'description' => $validated['description'],
            'status' => 'draft',
            'path' => null,
        ]);

        return response(['request' => $serviceRequest], Response::HTTP_CREATED);
    }

    public function choosePath(Request $request): Response
    {
        $validated = $request->validate([
            'request_id' => ['required', 'integer', 'exists:requests,id'],
            'path' => ['required', Rule::in(['fix_now', 'plan_properly'])],
        ]);

        $serviceRequest = ServiceRequest::findOrFail($validated['request_id']);

        if ($serviceRequest->status !== 'draft') {
            return response(['message' => 'Request already processed.'], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $serviceRequest->path = $validated['path'];
        $serviceRequest->status = 'submitted';
        $serviceRequest->save();

        if ($validated['path'] === 'plan_properly') {
            Mail::to($serviceRequest->email)->send(new PlanItProperlyConfirmation($serviceRequest));

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
                Mail::to($adminEmails)->send(new PlanItProperlyInternalNotification($serviceRequest));
            }
        }

        return response([
            'request' => $serviceRequest,
            'message' => $validated['path'] === 'plan_properly'
                ? 'Plan It Properly request received.'
                : 'Fix It Now path selected.',
        ]);
    }
}
