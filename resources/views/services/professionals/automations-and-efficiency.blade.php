@extends('layouts.marketing')

@section('title', 'Automations & Efficiency | HappyTek — Easily Solved.')

@section('content')
<div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-16 space-y-10">
    <a href="{{ url('/#services') }}" class="text-sm font-semibold text-[#1f65d1] hover:underline">← Back to services</a>
    <div class="card-surface p-8 lg:p-10 space-y-6 border-[#dbe7f8] shadow-md">
        <div class="space-y-3">
            <span class="pill">Professionals</span>
            <h1 class="text-3xl sm:text-4xl font-semibold text-[#0f1b2b]">Automations & efficiency — less copy-paste, more delivery.</h1>
            <p class="text-lg text-[#2b3f54]">We streamline the steps you repeat: proposals, follow-ups, file requests, and reminders. You keep control while the busywork runs itself.</p>
        </div>
        <div class="flex flex-col sm:flex-row gap-4">
            <a href="/contact" class="btn-primary">Simplify my workflow</a>
            <a href="/pricing" class="btn-secondary">Review options</a>
        </div>
    </div>

    <div class="grid lg:grid-cols-2 gap-6">
        <div class="muted-card p-6 space-y-3">
            <h2 class="text-xl font-semibold text-[#0f1b2b]">Who it’s for</h2>
            <ul class="space-y-3 text-sm text-[#2b3f54]">
                <li class="flex gap-3"><span class="accent-badge mt-1"></span><span>Solo pros who want client onboarding and updates to happen automatically.</span></li>
                <li class="flex gap-3"><span class="accent-badge mt-1"></span><span>Founders tired of copying notes between forms, spreadsheets, and inboxes.</span></li>
                <li class="flex gap-3"><span class="accent-badge mt-1"></span><span>Practices that need reminders and checklists without hiring an assistant.</span></li>
            </ul>
        </div>
        <div class="muted-card p-6 space-y-3">
            <h2 class="text-xl font-semibold text-[#0f1b2b]">What’s included</h2>
            <ul class="space-y-3 text-sm text-[#2b3f54]">
                <li class="flex gap-3"><span class="accent-badge mt-1"></span><span>Process map to spot the repeat steps worth automating.</span></li>
                <li class="flex gap-3"><span class="accent-badge mt-1"></span><span>Automations built in the tools you already use — no heavy new software.</span></li>
                <li class="flex gap-3"><span class="accent-badge mt-1"></span><span>Testing, handoff notes, and a quick training so you know how to adjust later.</span></li>
            </ul>
        </div>
    </div>

    <div class="card-surface p-8 space-y-4 border-[#e1f0d7] shadow-md">
        <h2 class="text-xl font-semibold text-[#0f1b2b]">What it solves</h2>
        <p class="text-[#2b3f54]">Client steps happen on time with fewer errors. You get your evenings back while your practice still feels personal.</p>
        <div class="flex flex-col sm:flex-row gap-3">
            <a href="/contact" class="btn-primary">Start an efficiency tune-up</a>
            <a href="/pricing" class="btn-secondary">See pricing</a>
        </div>
    </div>
</div>
@endsection
