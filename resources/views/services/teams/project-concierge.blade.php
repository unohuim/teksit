@extends('layouts.marketing')

@section('title', 'Project Concierge | HappyTek — Easily Solved.')

@section('content')
<div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-16 space-y-10">
    <a href="{{ url('/#services') }}" class="text-sm font-semibold text-[#1f65d1] hover:underline">← Back to services</a>
    <div class="card-surface p-8 lg:p-10 space-y-6 border-[#dbe7f8] shadow-md">
        <div class="space-y-3">
            <span class="pill">Small Teams</span>
            <h1 class="text-3xl sm:text-4xl font-semibold text-[#0f1b2b]">Project concierge — one guide to keep tech pieces moving.</h1>
            <p class="text-lg text-[#2b3f54]">We act as your tech point-person for client projects or vendor work. Approvals, access, and updates flow through one partner so nothing slips.</p>
        </div>
        <div class="flex flex-col sm:flex-row gap-4">
            <a href="/contact" class="btn-primary">Talk to us</a>
            <a href="/pricing" class="btn-secondary">Review pricing</a>
        </div>
    </div>

    <div class="grid lg:grid-cols-2 gap-6">
        <div class="muted-card p-6 space-y-3">
            <h2 class="text-xl font-semibold text-[#0f1b2b]">Who it’s for</h2>
            <ul class="space-y-3 text-sm text-[#2b3f54]">
                <li class="flex gap-3"><span class="accent-badge mt-1"></span><span>Teams juggling multiple client projects or vendor handoffs.</span></li>
                <li class="flex gap-3"><span class="accent-badge mt-1"></span><span>Leaders who want a steady partner to translate needs into clear tasks.</span></li>
                <li class="flex gap-3"><span class="accent-badge mt-1"></span><span>Groups needing someone to own tech checklists without hiring full-time.</span></li>
            </ul>
        </div>
        <div class="muted-card p-6 space-y-3">
            <h2 class="text-xl font-semibold text-[#0f1b2b]">What’s included</h2>
            <ul class="space-y-3 text-sm text-[#2b3f54]">
                <li class="flex gap-3"><span class="accent-badge mt-1"></span><span>Dedicated project contact coordinating with your team and partners.</span></li>
                <li class="flex gap-3"><span class="accent-badge mt-1"></span><span>Light project plan with timelines, access, and approvals tracked.</span></li>
                <li class="flex gap-3"><span class="accent-badge mt-1"></span><span>Weekly updates and recap notes so everyone knows status and next steps.</span></li>
            </ul>
        </div>
    </div>

    <div class="card-surface p-8 space-y-4 border-[#e1f0d7] shadow-md">
        <h2 class="text-xl font-semibold text-[#0f1b2b]">What it solves</h2>
        <p class="text-[#2b3f54]">Your projects stop stalling because of tech coordination. One partner keeps the timeline steady and keeps you in the loop.</p>
        <div class="flex flex-col sm:flex-row gap-3">
            <a href="/contact" class="btn-primary">Book a concierge</a>
            <a href="/pricing" class="btn-secondary">See options</a>
        </div>
    </div>
</div>
@endsection
