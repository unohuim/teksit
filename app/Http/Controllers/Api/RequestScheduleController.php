<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ServiceRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class RequestScheduleController extends Controller
{
    public function store(Request $request, ServiceRequest $serviceRequest): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'scheduled_at' => ['required', 'date'],
            'calendly_event_uri' => ['required', 'string'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'The scheduled data is invalid.',
                'errors' => $validator->errors(),
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $validated = $validator->validated();

        if (! in_array($serviceRequest->status, ['started', 'scheduled'], true)) {
            return response()->json([
                'success' => false,
                'message' => 'Request already processed.',
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $eventUuid = Str::afterLast($validated['calendly_event_uri'], '/');

        $serviceRequest->calendly_event_uri = $validated['calendly_event_uri'];
        $serviceRequest->calendly_event_uuid = $eventUuid;
        $serviceRequest->scheduled_at = $validated['scheduled_at'];
        $serviceRequest->status = 'scheduled';
        $serviceRequest->save();

        return response()->json([
            'success' => true,
            'status' => $serviceRequest->status,
            'request_id' => $serviceRequest->id,
            'next_step' => 'billing',
            'request' => $serviceRequest,
            'message' => 'Discovery call scheduled.',
        ]);
    }
}
