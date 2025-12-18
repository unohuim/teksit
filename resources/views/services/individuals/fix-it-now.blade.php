@extends('layouts.marketing')

@section('title', 'Fix It Now | HappyTek — Easily Solved.')

@section('content')
<div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-16 space-y-10">
    <a href="{{ url('/#services') }}" class="text-sm font-semibold text-[#1f65d1] hover:underline">← Back to services</a>
    <div class="card-surface p-8 lg:p-10 space-y-6 border-[#dbe7f8] shadow-md">
        <div class="space-y-3">
            <span class="pill">Individuals</span>
            <h1 class="text-3xl sm:text-4xl font-semibold text-[#0f1b2b]">Fix it now — the stuck thing works again.</h1>
            <p class="text-lg text-[#2b3f54]">Remote, respectful help that solves the current issue without extra back-and-forth. You get the fix, the steps we took, and what to watch for next time.</p>
        </div>
        <div class="flex flex-col sm:flex-row gap-4">
            <a href="/contact" class="btn-primary">Get it fixed</a>
            <a href="/pricing" class="btn-secondary">See pricing</a>
        </div>
    </div>

    <div class="grid lg:grid-cols-2 gap-6">
        <div class="muted-card p-6 space-y-3">
            <h2 class="text-xl font-semibold text-[#0f1b2b]">Who it’s for</h2>
            <ul class="space-y-3 text-sm text-[#2b3f54]">
                <li class="flex gap-3"><span class="accent-badge mt-1"></span><span>Households where a device, email, or account stopped cooperating.</span></li>
                <li class="flex gap-3"><span class="accent-badge mt-1"></span><span>Seniors and caregivers who want a calm, steady walkthrough.</span></li>
                <li class="flex gap-3"><span class="accent-badge mt-1"></span><span>Anyone who needs a printer, Wi‑Fi, or app working again right away.</span></li>
            </ul>
        </div>
        <div class="muted-card p-6 space-y-3">
            <h2 class="text-xl font-semibold text-[#0f1b2b]">What’s included</h2>
            <ul class="space-y-3 text-sm text-[#2b3f54]">
                <li class="flex gap-3"><span class="accent-badge mt-1"></span><span>Live remote session to diagnose and resolve the immediate issue.</span></li>
                <li class="flex gap-3"><span class="accent-badge mt-1"></span><span>Settings check to prevent repeats — Wi‑Fi, updates, backups, or permissions.</span></li>
                <li class="flex gap-3"><span class="accent-badge mt-1"></span><span>Short recap with the steps, any credentials updated, and what to do next.</span></li>
            </ul>
        </div>
    </div>

    <div class="card-surface p-8 space-y-4 border-[#e1f0d7] shadow-md">
        <h2 class="text-xl font-semibold text-[#0f1b2b]">What it solves</h2>
        <p class="text-[#2b3f54]">No more guessing why the device or account failed. We steady the connection, close security gaps, and leave you confident it works.</p>
        <div class="flex flex-col sm:flex-row gap-3">
            <a href="/contact" class="btn-primary">Book a session</a>
            <a href="/pricing" class="btn-secondary">Review visit pricing</a>
        </div>
    </div>
</div>
@endsection
