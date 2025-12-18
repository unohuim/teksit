@extends('layouts.marketing')

@section('title', 'Security & Passwords | HappyTek — Easily Solved.')

@section('content')
<div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-16 space-y-10">
    <a href="{{ url('/#services') }}" class="text-sm font-semibold text-[#1f65d1] hover:underline">← Back to services</a>
    <div class="card-surface p-8 lg:p-10 space-y-6 border-[#dbe7f8] shadow-md">
        <div class="space-y-3">
            <span class="pill">Individuals</span>
            <h1 class="text-3xl sm:text-4xl font-semibold text-[#0f1b2b]">Security & passwords — safe access without lockouts.</h1>
            <p class="text-lg text-[#2b3f54]">We organize logins, turn on protections, and make sure you can get back in. You keep the plain-language notes so nothing feels risky.</p>
        </div>
        <div class="flex flex-col sm:flex-row gap-4">
            <a href="/contact" class="btn-primary">Secure my accounts</a>
            <a href="/pricing" class="btn-secondary">View visit pricing</a>
        </div>
    </div>

    <div class="grid lg:grid-cols-2 gap-6">
        <div class="muted-card p-6 space-y-3">
            <h2 class="text-xl font-semibold text-[#0f1b2b]">Who it’s for</h2>
            <ul class="space-y-3 text-sm text-[#2b3f54]">
                <li class="flex gap-3"><span class="accent-badge mt-1"></span><span>Seniors, caregivers, and busy families who want shared access without confusion.</span></li>
                <li class="flex gap-3"><span class="accent-badge mt-1"></span><span>Anyone dealing with repeated password resets or suspicious sign-in alerts.</span></li>
                <li class="flex gap-3"><span class="accent-badge mt-1"></span><span>People who need two-factor in place but don’t want to juggle codes alone.</span></li>
            </ul>
        </div>
        <div class="muted-card p-6 space-y-3">
            <h2 class="text-xl font-semibold text-[#0f1b2b]">What’s included</h2>
            <ul class="space-y-3 text-sm text-[#2b3f54]">
                <li class="flex gap-3"><span class="accent-badge mt-1"></span><span>Password manager setup with organized vaults and shared access where needed.</span></li>
                <li class="flex gap-3"><span class="accent-badge mt-1"></span><span>Two-factor verification, recovery contacts, and backup codes stored safely.</span></li>
                <li class="flex gap-3"><span class="accent-badge mt-1"></span><span>Security check on email, cloud storage, and devices with clear next steps.</span></li>
            </ul>
        </div>
    </div>

    <div class="card-surface p-8 space-y-4 border-[#e1f0d7] shadow-md">
        <h2 class="text-xl font-semibold text-[#0f1b2b]">What it solves</h2>
        <p class="text-[#2b3f54]">You know exactly how to log in, share access, and recover accounts if something goes wrong. Everything is written down and confirmed with you before we leave.</p>
        <div class="flex flex-col sm:flex-row gap-3">
            <a href="/contact" class="btn-primary">Schedule security help</a>
            <a href="/pricing" class="btn-secondary">See available options</a>
        </div>
    </div>
</div>
@endsection
