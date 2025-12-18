@extends('layouts.marketing')

@section('title', 'Setups | HappyTek — Easily Solved.')

@section('content')
<div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-16 space-y-10">
    <a href="{{ url('/#services') }}" class="text-sm font-semibold text-[#1f65d1] hover:underline">← Back to services</a>
    <div class="card-surface p-8 lg:p-10 space-y-6 border-[#dbe7f8] shadow-md">
        <div class="space-y-3">
            <span class="pill">Individuals</span>
            <h1 class="text-3xl sm:text-4xl font-semibold text-[#0f1b2b]">Setups — new tech ready on day one.</h1>
            <p class="text-lg text-[#2b3f54]">We set up devices, email, streaming, and backups so they behave the way you expect. Everything is documented so you can revisit settings anytime.</p>
        </div>
        <div class="flex flex-col sm:flex-row gap-4">
            <a href="/contact" class="btn-primary">Start a setup</a>
            <a href="/pricing" class="btn-secondary">See setup pricing</a>
        </div>
    </div>

    <div class="grid lg:grid-cols-2 gap-6">
        <div class="muted-card p-6 space-y-3">
            <h2 class="text-xl font-semibold text-[#0f1b2b]">Who it’s for</h2>
            <ul class="space-y-3 text-sm text-[#2b3f54]">
                <li class="flex gap-3"><span class="accent-badge mt-1"></span><span>Anyone getting a new phone, tablet, laptop, or streaming device.</span></li>
                <li class="flex gap-3"><span class="accent-badge mt-1"></span><span>Busy households that want calendar and photo sharing set up properly.</span></li>
                <li class="flex gap-3"><span class="accent-badge mt-1"></span><span>Caregivers who want trusted access without risking privacy.</span></li>
            </ul>
        </div>
        <div class="muted-card p-6 space-y-3">
            <h2 class="text-xl font-semibold text-[#0f1b2b]">What’s included</h2>
            <ul class="space-y-3 text-sm text-[#2b3f54]">
                <li class="flex gap-3"><span class="accent-badge mt-1"></span><span>Device setup, updates, and sign-ins with permissions checked.</span></li>
                <li class="flex gap-3"><span class="accent-badge mt-1"></span><span>Email, calendars, and app installs arranged for how you actually use them.</span></li>
                <li class="flex gap-3"><span class="accent-badge mt-1"></span><span>Backup, password manager, and simple care notes delivered after the visit.</span></li>
            </ul>
        </div>
    </div>

    <div class="card-surface p-8 space-y-4 border-[#e1f0d7] shadow-md">
        <h2 class="text-xl font-semibold text-[#0f1b2b]">What it solves</h2>
        <p class="text-[#2b3f54]">No more guessing which app to use or why storage is full. Everything is organized, secured, and documented so you can enjoy the tech instead of wrestling it.</p>
        <div class="flex flex-col sm:flex-row gap-3">
            <a href="/contact" class="btn-primary">Book your setup</a>
            <a href="/pricing" class="btn-secondary">See options</a>
        </div>
    </div>
</div>
@endsection
