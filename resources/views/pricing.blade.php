@extends('layouts.marketing')

@section('title', 'HappyTek Pricing — Easily Solved and predictable')

@section('content')
<section class="bg-white py-16 sm:py-20">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12">
        <div class="text-center space-y-4 max-w-3xl mx-auto">
            <p class="text-sm font-semibold text-slate-700 uppercase tracking-wide">Pricing</p>
            <h1 class="text-3xl sm:text-4xl font-semibold text-slate-900">Straightforward pricing. Tech handled.</h1>
            <p class="text-lg text-slate-700">Every option is scoped before we start. No hidden fees, no tickets — just clear outcomes and documented fixes.</p>
        </div>

        <div class="grid md:grid-cols-3 gap-6">
            <div class="bg-slate-50 border border-slate-200 rounded-2xl shadow-sm p-6 flex flex-col">
                <p class="text-sm font-semibold text-slate-700 uppercase">Session</p>
                <h2 class="mt-2 text-xl font-semibold text-slate-900">Focused Visit</h2>
                <p class="mt-2 text-3xl font-semibold text-slate-900">$129 <span class="text-base font-medium text-slate-600">per visit</span></p>
                <ul class="mt-4 space-y-2 text-sm text-slate-700 flex-1">
                    <li>Immediate help for the current issue.</li>
                    <li>Great for seniors, caregivers, and quick founder fixes.</li>
                    <li>Written recap with what changed and what to watch.</li>
                </ul>
                <a href="/contact" class="mt-6 inline-flex items-center justify-center px-4 py-2 bg-slate-900 text-white font-semibold rounded-lg shadow-sm hover:bg-slate-800 transition">Book a visit</a>
            </div>

            <div class="bg-white border border-slate-200 rounded-2xl shadow-lg p-6 flex flex-col">
                <p class="text-sm font-semibold text-slate-700 uppercase">Setup</p>
                <h2 class="mt-2 text-xl font-semibold text-slate-900">Launch Setup</h2>
                <p class="mt-2 text-3xl font-semibold text-slate-900">$699 <span class="text-base font-medium text-slate-600">one-time</span></p>
                <ul class="mt-4 space-y-2 text-sm text-slate-700 flex-1">
                    <li>Domain, professional email, booking links, and routing.</li>
                    <li>Light single-page site so you look ready on day one.</li>
                    <li>Permissions, passwords, and a short handoff guide.</li>
                </ul>
                <a href="/contact" class="mt-6 inline-flex items-center justify-center px-4 py-2 bg-slate-900 text-white font-semibold rounded-lg shadow-sm hover:bg-slate-800 transition">Start setup</a>
            </div>

            <div class="bg-slate-50 border border-slate-200 rounded-2xl shadow-sm p-6 flex flex-col">
                <p class="text-sm font-semibold text-slate-700 uppercase">Care plans</p>
                <h2 class="mt-2 text-xl font-semibold text-slate-900">Ongoing Care</h2>
                <p class="mt-2 text-3xl font-semibold text-slate-900">$99 / $149 / $249 <span class="text-base font-medium text-slate-600">per month</span></p>
                <ul class="mt-4 space-y-2 text-sm text-slate-700 flex-1">
                    <li>Included sessions each month plus priority response.</li>
                    <li>Proactive check-ins for seniors, founders, and teams.</li>
                    <li>Predictable add-ons for extra visits when needed.</li>
                </ul>
                <a href="/contact" class="mt-6 inline-flex items-center justify-center px-4 py-2 bg-white text-slate-900 border border-slate-200 font-semibold rounded-lg shadow-sm hover:border-slate-400 transition">Explore plans</a>
            </div>
        </div>

        <div class="bg-slate-100 border border-slate-200 rounded-3xl p-8 lg:p-10 text-slate-900 space-y-6">
            <div class="space-y-2">
                <h3 class="text-lg font-semibold">What you can expect</h3>
                <p class="text-sm text-slate-700">HappyTek keeps tech energy high by giving you clarity before any work begins.</p>
            </div>
            <ul class="grid sm:grid-cols-2 gap-4 text-sm text-slate-800">
                <li class="bg-white border border-slate-200 rounded-xl p-4">Remote-first: phone, video, or secure screenshare based on your preference.</li>
                <li class="bg-white border border-slate-200 rounded-xl p-4">Plain-language recaps and checklists for households, caregivers, and teammates.</li>
                <li class="bg-white border border-slate-200 rounded-xl p-4">No long-term contracts. Pause or book ad hoc visits any time.</li>
                <li class="bg-white border border-slate-200 rounded-xl p-4">Built for low tech energy seniors, creatives, founders, realtors, and small teams.</li>
            </ul>
            <div class="bg-white border border-slate-200 rounded-xl p-4 text-sm text-slate-800">
                <p class="font-semibold text-slate-900">Need clarity first?</p>
                <p class="mt-1">Share what’s slowing you down. We reply with the exact next steps and the cost before we start.</p>
            </div>
        </div>
    </div>
</section>
@endsection
