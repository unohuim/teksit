<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ServiceRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class RequestScheduleController extends Controller
{
    public function store(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'request_id' => ['required', 'integer'],
            'calendly_event_uuid' => ['required', 'string', 'max:255'],
            'scheduled_at' => ['required', 'date'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()->first(),
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $validated = $validator->validated();
        $serviceRequest = ServiceRequest::find($validated['request_id']);

        if (! $serviceRequest) {
            return response()->json([
                'success' => false,
                'message' => 'Request not found.',
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        if (! in_array($serviceRequest->status, ['started', 'scheduled'], true)) {
            return response()->json([
                'success' => false,
                'message' => 'Request already processed.',
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $serviceRequest->calendly_event_uuid = $validated['calendly_event_uuid'];
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
