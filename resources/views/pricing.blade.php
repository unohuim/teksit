@extends('layouts.marketing')

@section('title', 'HappyTek Pricing — Easily Solved and predictable')

@section('content')
<section class="bg-white/70 backdrop-blur-sm py-16 sm:py-20">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12">
        <div class="text-center space-y-4 max-w-3xl mx-auto">
            <span class="pill">Pricing</span>
            <h1 class="text-3xl sm:text-4xl font-semibold text-[#0f1b2b]">Straightforward pricing. Tech handled.</h1>
            <p class="text-lg text-[#2b3f54]">Every option is scoped before we start. No hidden fees, no tickets — just clear outcomes and documented fixes.</p>
        </div>

        <div class="grid md:grid-cols-3 gap-6">
            <div class="muted-card p-6 flex flex-col shadow-sm">
                <p class="text-sm font-semibold text-[#215b3a] uppercase">Session</p>
                <h2 class="mt-2 text-xl font-semibold text-[#0f1b2b]">Focused Visit</h2>
                <p class="mt-2 text-3xl font-semibold text-[#0f1b2b]">$129 <span class="text-base font-medium text-[#2b3f54]">per visit</span></p>
                <ul class="mt-4 space-y-2 text-sm text-[#2b3f54] flex-1">
                    <li>Immediate help for the current issue.</li>
                    <li>Great for seniors, caregivers, and quick founder fixes.</li>
                    <li>Written recap with what changed and what to watch.</li>
                </ul>
                <a href="/contact" class="mt-6 btn-primary justify-center">Book a visit</a>
            </div>

            <div class="card-surface p-6 flex flex-col shadow-lg border-[#d9e8d2]">
                <p class="text-sm font-semibold text-[#215b3a] uppercase">Setup</p>
                <h2 class="mt-2 text-xl font-semibold text-[#0f1b2b]">Launch Setup</h2>
                <p class="mt-2 text-3xl font-semibold text-[#0f1b2b]">$699 <span class="text-base font-medium text-[#2b3f54]">one-time</span></p>
                <ul class="mt-4 space-y-2 text-sm text-[#2b3f54] flex-1">
                    <li>Domain, professional email, booking links, and routing.</li>
                    <li>Light single-page site so you look ready on day one.</li>
                    <li>Permissions, passwords, and a short handoff guide.</li>
                </ul>
                <a href="/contact" class="mt-6 btn-primary justify-center">Start setup</a>
            </div>

            <div class="muted-card p-6 flex flex-col shadow-sm">
                <p class="text-sm font-semibold text-[#215b3a] uppercase">Care plans</p>
                <h2 class="mt-2 text-xl font-semibold text-[#0f1b2b]">Ongoing Care</h2>
                <p class="mt-2 text-3xl font-semibold text-[#0f1b2b]">$99 / $149 / $249 <span class="text-base font-medium text-[#2b3f54]">per month</span></p>
                <ul class="mt-4 space-y-2 text-sm text-[#2b3f54] flex-1">
                    <li>Included sessions each month plus priority response.</li>
                    <li>Proactive check-ins for seniors, founders, and teams.</li>
                    <li>Predictable add-ons for extra visits when needed.</li>
                </ul>
                <a href="/contact" class="mt-6 btn-secondary justify-center">Explore plans</a>
            </div>
        </div>

        <div class="card-surface border-[#dbe7f8] rounded-3xl p-8 lg:p-10 text-[#0f1b2b] space-y-6 shadow-md">
            <div class="space-y-2">
                <h3 class="text-lg font-semibold">What you can expect</h3>
                <p class="text-sm text-[#2b3f54]">HappyTek keeps tech energy high by giving you clarity before any work begins.</p>
            </div>
            <ul class="grid sm:grid-cols-2 gap-4 text-sm text-[#2b3f54]">
                <li class="card-surface p-4">Remote-first: phone, video, or secure screenshare based on your preference.</li>
                <li class="card-surface p-4">Plain-language recaps and checklists for households, caregivers, and teammates.</li>
                <li class="card-surface p-4">No long-term contracts. Pause or book ad hoc visits any time.</li>
                <li class="card-surface p-4">Built for low tech energy seniors, creatives, founders, realtors, and small teams.</li>
            </ul>
            <div class="muted-card p-4 text-sm text-[#2b3f54]">
                <p class="font-semibold text-[#0f1b2b]">Need clarity first?</p>
                <p class="mt-1">Share what’s slowing you down. We reply with the exact next steps and the cost before we start.</p>
            </div>
        </div>
    </div>
</section>
@endsection
