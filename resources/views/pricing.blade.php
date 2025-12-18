@extends('layouts.marketing')

@section('title', 'HappyTek Pricing | Calm, simple remote tech care plans')

@section('content')
<section class="bg-white py-16 sm:py-20">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12">
        <div class="text-center space-y-4 max-w-3xl mx-auto">
            <p class="text-sm font-semibold text-emerald-700 uppercase tracking-wide">Pricing</p>
            <h1 class="text-3xl sm:text-4xl font-semibold text-slate-900">Clear, reassuring options for remote tech help</h1>
            <p class="text-lg text-slate-700">Choose a single session or stay supported with gentle care plans. No contracts, no surprise fees — just calm guidance.</p>
        </div>

        <div class="grid md:grid-cols-3 gap-6">
            <div class="bg-slate-50 border border-slate-200 rounded-2xl shadow-sm p-6 flex flex-col">
                <p class="text-sm font-semibold text-emerald-700 uppercase">Session</p>
                <h2 class="mt-2 text-xl font-semibold text-slate-900">Personal Tech Care</h2>
                <p class="mt-2 text-3xl font-semibold text-slate-900">$129 <span class="text-base font-medium text-slate-600">per visit</span></p>
                <ul class="mt-4 space-y-2 text-sm text-slate-700 flex-1">
                    <li>Patient coaching for low tech energy moments.</li>
                    <li>Phones, tablets, laptops, email, and safety basics.</li>
                    <li>Written steps so caregivers and family stay aligned.</li>
                </ul>
                <a href="/contact" class="mt-6 inline-flex items-center justify-center px-4 py-2 bg-slate-900 text-white font-semibold rounded-lg shadow-sm hover:bg-emerald-700 transition">Book a session</a>
            </div>

            <div class="bg-white border border-emerald-200 rounded-2xl shadow-lg p-6 flex flex-col">
                <p class="text-sm font-semibold text-emerald-700 uppercase">Setup</p>
                <h2 class="mt-2 text-xl font-semibold text-slate-900">Founder / Solo Setup</h2>
                <p class="mt-2 text-3xl font-semibold text-slate-900">$699 <span class="text-base font-medium text-slate-600">one-time</span></p>
                <ul class="mt-4 space-y-2 text-sm text-slate-700 flex-1">
                    <li>Domain, professional email, and shared calendars.</li>
                    <li>Booking links plus a clean, single-page web presence.</li>
                    <li>Onboarding guide to keep things tidy after launch.</li>
                </ul>
                <a href="/contact" class="mt-6 inline-flex items-center justify-center px-4 py-2 bg-slate-900 text-white font-semibold rounded-lg shadow-sm hover:bg-emerald-700 transition">Start setup</a>
            </div>

            <div class="bg-slate-50 border border-slate-200 rounded-2xl shadow-sm p-6 flex flex-col">
                <p class="text-sm font-semibold text-emerald-700 uppercase">Care plans</p>
                <h2 class="mt-2 text-xl font-semibold text-slate-900">Ongoing Calm Care</h2>
                <p class="mt-2 text-3xl font-semibold text-slate-900">$99 / $149 / $249 <span class="text-base font-medium text-slate-600">per month</span></p>
                <ul class="mt-4 space-y-2 text-sm text-slate-700 flex-1">
                    <li>Included monthly sessions and priority response.</li>
                    <li>Proactive check-ins for seniors and small teams.</li>
                    <li>Transparent overage pricing per extra visit.</li>
                </ul>
                <a href="/contact" class="mt-6 inline-flex items-center justify-center px-4 py-2 bg-white text-slate-900 border border-slate-200 font-semibold rounded-lg shadow-sm hover:border-emerald-200 hover:text-emerald-700 transition">Explore plans</a>
            </div>
        </div>

        <div class="bg-slate-100 border border-slate-200 rounded-3xl p-8 lg:p-10 text-slate-900 space-y-6">
            <div class="space-y-2">
                <h3 class="text-lg font-semibold">What you can expect</h3>
                <p class="text-sm text-slate-700">Every plan is calm, remote, and respects your boundaries.</p>
            </div>
            <ul class="grid sm:grid-cols-2 gap-4 text-sm text-slate-800">
                <li class="bg-white border border-slate-200 rounded-xl p-4">Remote-first: phone, Zoom, or secure screenshare — whatever feels easiest.</li>
                <li class="bg-white border border-slate-200 rounded-xl p-4">Plain-language recaps after every session so family and teammates stay aligned.</li>
                <li class="bg-white border border-slate-200 rounded-xl p-4">No long-term contracts. Pause, upgrade, or return for one-off help anytime.</li>
                <li class="bg-white border border-slate-200 rounded-xl p-4">Designed for low tech energy, founders, and small teams who want less friction.</li>
            </ul>
        </div>
    </div>
</section>
@endsection
