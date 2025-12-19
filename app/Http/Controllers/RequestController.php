<?php

namespace App\Http\Controllers;

use App\Models\ServiceRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class RequestController extends Controller
{
    public function confirmed(Request $request): RedirectResponse|View
    {
        $requestId = $request->query('request_id') ?? $request->session()->pull('latest_paid_request_id');

        if (! $requestId) {
            return redirect()->route('contact');
        }

        $serviceRequest = ServiceRequest::with('payments')->findOrFail($requestId);

        return view('requests.confirmed', [
            'requestModel' => $serviceRequest,
            'latestPayment' => $serviceRequest->payments()->latest()->first(),
        ]);
    }
}
