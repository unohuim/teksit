@extends('layouts.marketing')

@section('title', 'Wi-Fi & Networkables | HappyTek — Easily Solved.')

@section('content')
<div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-16 space-y-10">
    <a href="{{ url('/#services') }}" class="text-sm font-semibold text-[#1f65d1] hover:underline">← Back to services</a>
    <div class="card-surface p-8 lg:p-10 space-y-6 border-[#dbe7f8] shadow-md">
        <div class="space-y-3">
            <span class="pill">Individuals</span>
            <h1 class="text-3xl sm:text-4xl font-semibold text-[#0f1b2b]">Wi‑Fi & networkables — steady connections everywhere.</h1>
            <p class="text-lg text-[#2b3f54]">Routers, printers, smart TVs, and streaming boxes tuned so they stay online. We tidy names, passwords, and placement so every room feels solid.</p>
        </div>
        <div class="flex flex-col sm:flex-row gap-4">
            <a href="/contact" class="btn-primary">Stabilize my Wi‑Fi</a>
            <a href="/pricing" class="btn-secondary">Check visit rates</a>
        </div>
    </div>

    <div class="grid lg:grid-cols-2 gap-6">
        <div class="muted-card p-6 space-y-3">
            <h2 class="text-xl font-semibold text-[#0f1b2b]">Who it’s for</h2>
            <ul class="space-y-3 text-sm text-[#2b3f54]">
                <li class="flex gap-3"><span class="accent-badge mt-1"></span><span>Homes with dead zones, buffering, or printers that only work sometimes.</span></li>
                <li class="flex gap-3"><span class="accent-badge mt-1"></span><span>Families adding smart TVs or streaming boxes who want it done once, properly.</span></li>
                <li class="flex gap-3"><span class="accent-badge mt-1"></span><span>People sharing Wi‑Fi with caregivers or guests and needing safe access.</span></li>
            </ul>
        </div>
        <div class="muted-card p-6 space-y-3">
            <h2 class="text-xl font-semibold text-[#0f1b2b]">What’s included</h2>
            <ul class="space-y-3 text-sm text-[#2b3f54]">
                <li class="flex gap-3"><span class="accent-badge mt-1"></span><span>Router health check, channel cleanup, and naming that makes sense.</span></li>
                <li class="flex gap-3"><span class="accent-badge mt-1"></span><span>Printer and device pairing with a quick-print confirmation and instructions.</span></li>
                <li class="flex gap-3"><span class="accent-badge mt-1"></span><span>Guest networks and parental controls set with clear notes and passwords.</span></li>
            </ul>
        </div>
    </div>

    <div class="card-surface p-8 space-y-4 border-[#e1f0d7] shadow-md">
        <h2 class="text-xl font-semibold text-[#0f1b2b]">What it solves</h2>
        <p class="text-[#2b3f54]">Smooth streaming, steady calls, and printers that respond the first time. You keep the map of what changed so resets are simple later on.</p>
        <div class="flex flex-col sm:flex-row gap-3">
            <a href="/contact" class="btn-primary">Book Wi‑Fi help</a>
            <a href="/pricing" class="btn-secondary">View pricing</a>
        </div>
    </div>
</div>
@endsection
