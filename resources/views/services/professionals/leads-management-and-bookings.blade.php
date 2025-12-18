@extends('layouts.marketing')

@section('title', 'Leads Management & Bookings | HappyTek — Easily Solved.')

@section('content')
<div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-16 space-y-10">
    <a href="{{ url('/#services') }}" class="text-sm font-semibold text-[#1f65d1] hover:underline">← Back to services</a>
    <div class="card-surface p-8 lg:p-10 space-y-6 border-[#dbe7f8] shadow-md">
        <div class="space-y-3">
            <span class="pill">Professionals</span>
            <h1 class="text-3xl sm:text-4xl font-semibold text-[#0f1b2b]">Leads management & bookings — every inquiry answered.</h1>
            <p class="text-lg text-[#2b3f54]">Give prospects one clear path to book, confirm, and follow up. We align your forms, calendar, and reminders so you never lose a lead.</p>
        </div>
        <div class="flex flex-col sm:flex-row gap-4">
            <a href="/contact" class="btn-primary">Tidy my bookings</a>
            <a href="/pricing" class="btn-secondary">Review options</a>
        </div>
    </div>

    <div class="grid lg:grid-cols-2 gap-6">
        <div class="muted-card p-6 space-y-3">
            <h2 class="text-xl font-semibold text-[#0f1b2b]">Who it’s for</h2>
            <ul class="space-y-3 text-sm text-[#2b3f54]">
                <li class="flex gap-3"><span class="accent-badge mt-1"></span><span>Founders and solo pros juggling inquiries across email, DMs, and forms.</span></li>
                <li class="flex gap-3"><span class="accent-badge mt-1"></span><span>Service providers who need reminders sent without manual follow-ups.</span></li>
                <li class="flex gap-3"><span class="accent-badge mt-1"></span><span>Teams that want a shared view of leads without a heavy CRM.</span></li>
            </ul>
        </div>
        <div class="muted-card p-6 space-y-3">
            <h2 class="text-xl font-semibold text-[#0f1b2b]">What’s included</h2>
            <ul class="space-y-3 text-sm text-[#2b3f54]">
                <li class="flex gap-3"><span class="accent-badge mt-1"></span><span>Booking links aligned with your calendar, buffers, and availability.</span></li>
                <li class="flex gap-3"><span class="accent-badge mt-1"></span><span>Lead intake forms that capture the essentials and route to one inbox.</span></li>
                <li class="flex gap-3"><span class="accent-badge mt-1"></span><span>Automated confirmations and reminders with branded templates.</span></li>
            </ul>
        </div>
    </div>

    <div class="card-surface p-8 space-y-4 border-[#e1f0d7] shadow-md">
        <h2 class="text-xl font-semibold text-[#0f1b2b]">What it solves</h2>
        <p class="text-[#2b3f54]">Every lead sees the same simple path to work with you. You stop chasing messages and start meeting clients who show up prepared.</p>
        <div class="flex flex-col sm:flex-row gap-3">
            <a href="/contact" class="btn-primary">Book a setup</a>
            <a href="/pricing" class="btn-secondary">Explore pricing</a>
        </div>
    </div>
</div>
@endsection
