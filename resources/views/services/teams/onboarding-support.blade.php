@extends('layouts.marketing')

@section('title', 'Onboarding Support for Teams | HappyTek — Easily Solved.')

@section('content')
<div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-16 space-y-10">
    <a href="{{ url('/#services') }}" class="text-sm font-semibold text-[#1f65d1] hover:underline">← Back to services</a>
    <div class="card-surface p-8 lg:p-10 space-y-6 border-[#dbe7f8] shadow-md">
        <div class="space-y-3">
            <span class="pill">Small Teams</span>
            <h1 class="text-3xl sm:text-4xl font-semibold text-[#0f1b2b]">Onboarding support — new hires ready on day one.</h1>
            <p class="text-lg text-[#2b3f54]">We prep devices, access, and checklists so new teammates can start producing immediately. No scattered links or last-minute scrambles.</p>
        </div>
        <div class="flex flex-col sm:flex-row gap-4">
            <a href="/contact" class="btn-primary">Plan onboarding</a>
            <a href="/pricing" class="btn-secondary">Review pricing</a>
        </div>
    </div>

    <div class="grid lg:grid-cols-2 gap-6">
        <div class="muted-card p-6 space-y-3">
            <h2 class="text-xl font-semibold text-[#0f1b2b]">Who it’s for</h2>
            <ul class="space-y-3 text-sm text-[#2b3f54]">
                <li class="flex gap-3"><span class="accent-badge mt-1"></span><span>Teams under ten that need a repeatable way to bring people onboard.</span></li>
                <li class="flex gap-3"><span class="accent-badge mt-1"></span><span>Leaders who don’t have an IT desk but want things done consistently.</span></li>
                <li class="flex gap-3"><span class="accent-badge mt-1"></span><span>Remote teams balancing company security with fast access.</span></li>
            </ul>
        </div>
        <div class="muted-card p-6 space-y-3">
            <h2 class="text-xl font-semibold text-[#0f1b2b]">What’s included</h2>
            <ul class="space-y-3 text-sm text-[#2b3f54]">
                <li class="flex gap-3"><span class="accent-badge mt-1"></span><span>Role-based checklist covering devices, accounts, calendars, and folders.</span></li>
                <li class="flex gap-3"><span class="accent-badge mt-1"></span><span>Account creation, permission reviews, and security basics turned on.</span></li>
                <li class="flex gap-3"><span class="accent-badge mt-1"></span><span>Welcome notes you can reuse for the next hire so the process stays simple.</span></li>
            </ul>
        </div>
    </div>

    <div class="card-surface p-8 space-y-4 border-[#e1f0d7] shadow-md">
        <h2 class="text-xl font-semibold text-[#0f1b2b]">What it solves</h2>
        <p class="text-[#2b3f54]">Day-one friction disappears. Every hire knows where to go, and you know everything is secure and repeatable.</p>
        <div class="flex flex-col sm:flex-row gap-3">
            <a href="/contact" class="btn-primary">Schedule onboarding</a>
            <a href="/pricing" class="btn-secondary">See options</a>
        </div>
    </div>
</div>
@endsection
