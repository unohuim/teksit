@extends('layouts.marketing')

@section('title', 'Fix It Now — Confirmed')

@section('content')
<div class="py-16 sm:py-24">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white border border-[#d9e8d2] rounded-2xl shadow-sm p-8 sm:p-12 space-y-6 text-center">
            <p class="text-xs font-semibold uppercase text-[#1f65d1] tracking-wide">Confirmed</p>
            <h1 class="text-3xl sm:text-4xl font-bold text-[#0f1b2b]">You’re booked</h1>
            @if($serviceRequest && $serviceRequest->scheduled_at)
                <p class="text-lg text-[#234567]">We’ll meet on {{ $serviceRequest->scheduled_at->timezone(config('app.timezone'))->format('l, F j, Y g:i A T') }}@if($serviceRequest->duration) for {{ $serviceRequest->duration }} minutes@endif.</p>
            @else
                <p class="text-lg text-[#234567]">We’ve received your booking details. You’ll get a confirmation email shortly.</p>
            @endif
            <div class="space-y-2 text-[#234567]">
                <p>We’ll focus on the issue you described and keep it time-boxed.</p>
                <p>If it turns out to be bigger than expected, we’ll pause and recommend the right scoped approach before continuing.</p>
            </div>
        </div>
    </div>
</div>
@endsection
