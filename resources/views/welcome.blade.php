@extends('layouts.marketing')

@section('title', 'HappyTek | Calm remote tech help for humans with low tech energy')

@section('content')
<div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-16 sm:py-20 lg:py-24 space-y-16">
    <section class="grid lg:grid-cols-2 gap-12 items-center">
        <div class="space-y-6">
            <p class="text-sm font-semibold text-emerald-700 uppercase tracking-wide">Remote tech care across Canada</p>
            <h1 class="text-3xl sm:text-4xl lg:text-5xl font-semibold text-slate-900 leading-tight">Get your tech energy back with calm, human help.</h1>
            <p class="text-lg text-slate-700">HappyTek is the patient, plain-language tech companion for people who feel drained by devices. We guide seniors, caregivers, founders, and small teams without jargon or pressure.</p>
            <div class="flex flex-col sm:flex-row gap-4">
                <a href="/contact" class="inline-flex items-center justify-center px-5 py-3 bg-slate-900 text-white font-semibold rounded-lg shadow-sm hover:bg-emerald-700 transition">Schedule a calm session</a>
                <a href="/pricing" class="inline-flex items-center justify-center px-5 py-3 bg-white text-slate-900 font-semibold rounded-lg border border-slate-200 hover:border-emerald-200 hover:text-emerald-700">See plans</a>
            </div>
            <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 pt-4 text-sm text-slate-700">
                <div class="bg-white rounded-xl border border-slate-200/80 p-4 shadow-sm">
                    <p class="font-semibold text-slate-900">Low tech energy</p>
                    <p class="mt-1">Gentle coaching for seniors, caregivers, and anyone feeling overwhelmed.</p>
                </div>
                <div class="bg-white rounded-xl border border-slate-200/80 p-4 shadow-sm">
                    <p class="font-semibold text-slate-900">Founders</p>
                    <p class="mt-1">Set up email, calendars, and lightweight systems without friction.</p>
                </div>
                <div class="bg-white rounded-xl border border-slate-200/80 p-4 shadow-sm">
                    <p class="font-semibold text-slate-900">Small teams</p>
                    <p class="mt-1">Shared tools that stay organized with one person to call.</p>
                </div>
                <div class="bg-white rounded-xl border border-slate-200/80 p-4 shadow-sm">
                    <p class="font-semibold text-slate-900">Care circles</p>
                    <p class="mt-1">We keep everyone in the loop with written recaps.</p>
                </div>
            </div>
        </div>
        <div class="bg-white border border-slate-200/80 rounded-2xl shadow-lg p-8 space-y-6">
            <div class="flex items-start gap-3">
                <div class="h-12 w-12 rounded-full bg-emerald-50 text-emerald-700 flex items-center justify-center font-semibold">Care</div>
                <div>
                    <p class="text-lg font-semibold text-slate-900">Remote, respectful, and steady</p>
                    <p class="text-sm text-slate-600">Phone, Zoom, or screenshare — whatever feels easiest. No surprise access, ever.</p>
                </div>
            </div>
            <ul class="space-y-4 text-slate-700 text-sm">
                <li class="flex items-start gap-3">
                    <span class="mt-1 h-2.5 w-2.5 rounded-full bg-emerald-500"></span>
                    <span>We translate tech into human language and stay until it works.</span>
                </li>
                <li class="flex items-start gap-3">
                    <span class="mt-1 h-2.5 w-2.5 rounded-full bg-emerald-500"></span>
                    <span>Clear, written follow-ups so everyone knows the plan.</span>
                </li>
                <li class="flex items-start gap-3">
                    <span class="mt-1 h-2.5 w-2.5 rounded-full bg-emerald-500"></span>
                    <span>Flexible support: one session or ongoing care — your choice.</span>
                </li>
            </ul>
            <div class="bg-emerald-50 border border-emerald-100 rounded-xl p-4 text-sm text-emerald-900">
                <p class="font-semibold">New to HappyTek?</p>
                <p class="mt-1">Start with a single session. If you continue, we credit it toward any plan.</p>
            </div>
        </div>
    </section>

    <section class="bg-white rounded-3xl border border-slate-200/80 shadow-sm p-8 lg:p-12">
        <div class="max-w-3xl space-y-3">
            <p class="text-sm font-semibold text-emerald-700 uppercase">Who we support</p>
            <h2 class="text-3xl font-semibold text-slate-900">Built for people who would rather not think about tech.</h2>
            <p class="text-lg text-slate-700">Whether you’re guiding a parent, building a solo business, or keeping a tight-knit team moving, we make technology feel lighter.</p>
        </div>
        <div class="mt-10 grid md:grid-cols-3 gap-6">
            <div class="bg-slate-50 border border-slate-200 rounded-2xl p-6 shadow-sm">
                <p class="font-semibold text-slate-900">Low tech energy</p>
                <p class="mt-2 text-sm text-slate-700">Patient, screen-shared walkthroughs that respect pace and comfort. We keep instructions simple and repeatable.</p>
                <p class="mt-3 text-sm font-medium text-emerald-700">Outcome: confidence checking email, joining calls, and staying safe online.</p>
            </div>
            <div class="bg-slate-50 border border-slate-200 rounded-2xl p-6 shadow-sm">
                <p class="font-semibold text-slate-900">Founders & independents</p>
                <p class="mt-2 text-sm text-slate-700">Launch-ready essentials — domain, professional email, booking links, and a light site — without the tool fatigue.</p>
                <p class="mt-3 text-sm font-medium text-emerald-700">Outcome: polished client experiences with clear boundaries.</p>
            </div>
            <div class="bg-slate-50 border border-slate-200 rounded-2xl p-6 shadow-sm">
                <p class="font-semibold text-slate-900">Small teams</p>
                <p class="mt-2 text-sm text-slate-700">Shared inboxes, calendars, and storage with ongoing care. Your team texts one person when things wobble.</p>
                <p class="mt-3 text-sm font-medium text-emerald-700">Outcome: calm operations without an in-house IT feel.</p>
            </div>
        </div>
    </section>

    <section class="py-2">
        <div class="grid lg:grid-cols-2 gap-10 items-start">
            <div class="space-y-4">
                <p class="text-sm font-semibold text-emerald-700 uppercase">How we help</p>
                <h2 class="text-3xl font-semibold text-slate-900">Everything you need to stay connected, without the overwhelm.</h2>
                <p class="text-lg text-slate-700">We focus on practical wins and written steps you can keep. No "IT department" vibe — just a calm guide.</p>
                <div class="grid sm:grid-cols-2 gap-4">
                    @foreach ([
                        ['title' => 'Personal tech care', 'copy' => 'Day-to-day fixes, account cleanups, and calm coaching for any comfort level.'],
                        ['title' => 'Email, calendar, and devices', 'copy' => 'Professional inboxes, shared calendars, and secure device setup that simply works.'],
                        ['title' => 'Domain & digital presence', 'copy' => 'Claim your domain, set up routing, and launch a clean, single-page presence.'],
                        ['title' => 'Safety & backups', 'copy' => 'Password hygiene, two-factor setup, and backup checks so everyone can relax.']
                    ] as $item)
                        <div class="bg-white border border-slate-200 rounded-xl p-5 shadow-sm">
                            <p class="font-semibold text-slate-900">{{ $item['title'] }}</p>
                            <p class="mt-2 text-sm text-slate-700">{{ $item['copy'] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="bg-white border border-slate-200 rounded-2xl shadow-lg p-6 space-y-5">
                <h3 class="text-xl font-semibold text-slate-900">A calm, predictable process</h3>
                <ol class="space-y-4 text-slate-700 text-sm">
                    <li class="flex items-start gap-3">
                        <div class="h-7 w-7 flex items-center justify-center rounded-full bg-emerald-600 text-white font-semibold">1</div>
                        <div>
                            <p class="font-semibold text-slate-900">Book</p>
                            <p>Pick a time and share what is draining your tech energy.</p>
                        </div>
                    </li>
                    <li class="flex items-start gap-3">
                        <div class="h-7 w-7 flex items-center justify-center rounded-full bg-emerald-600 text-white font-semibold">2</div>
                        <div>
                            <p class="font-semibold text-slate-900">Meet calmly</p>
                            <p>Phone or Zoom with a single guide. We move at your pace and confirm comfort along the way.</p>
                        </div>
                    </li>
                    <li class="flex items-start gap-3">
                        <div class="h-7 w-7 flex items-center justify-center rounded-full bg-emerald-600 text-white font-semibold">3</div>
                        <div>
                            <p class="font-semibold text-slate-900">Fixed outcome</p>
                            <p>You leave with the issue resolved or setup complete, plus written steps.</p>
                        </div>
                    </li>
                    <li class="flex items-start gap-3">
                        <div class="h-7 w-7 flex items-center justify-center rounded-full bg-emerald-600 text-white font-semibold">4</div>
                        <div>
                            <p class="font-semibold text-slate-900">Stay supported</p>
                            <p>Choose a care plan or keep our number handy for next time. What the tech? Just text us.</p>
                        </div>
                    </li>
                </ol>
                <div class="bg-emerald-50 border border-emerald-100 rounded-xl p-4 text-sm text-emerald-900">
                    <p class="font-semibold">Always remote, always respectful</p>
                    <p class="mt-1">We only access what you approve and we narrate every step. Privacy stays intact.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-white border border-slate-200/80 rounded-3xl shadow-sm p-8 lg:p-12 space-y-8">
        <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6">
            <div class="space-y-2 max-w-2xl">
                <p class="text-sm font-semibold text-emerald-700 uppercase">Pricing preview</p>
                <h2 class="text-3xl font-semibold text-slate-900">Plans built for clarity and calm.</h2>
                <p class="text-lg text-slate-700">Simple options for one-time help or ongoing care. No long contracts, ever.</p>
            </div>
            <a href="/pricing" class="inline-flex items-center justify-center px-5 py-3 bg-slate-900 text-white font-semibold rounded-lg shadow-sm hover:bg-emerald-700 transition">View detailed pricing</a>
        </div>
        <div class="grid md:grid-cols-3 gap-6">
            <div class="bg-slate-50 border border-slate-200 rounded-2xl p-6 shadow-sm">
                <p class="text-sm font-semibold text-emerald-700 uppercase">Session</p>
                <p class="mt-2 text-2xl font-semibold text-slate-900">$129 / visit</p>
                <p class="mt-2 text-sm text-slate-700">A calm 1:1 session for the immediate issue. Great for seniors or quick fixes.</p>
                <a href="/contact" class="mt-4 inline-flex items-center justify-center px-4 py-2 bg-slate-900 text-white rounded-lg font-semibold hover:bg-emerald-700 transition">Book now</a>
            </div>
            <div class="bg-white border border-emerald-200 rounded-2xl p-6 shadow-md">
                <p class="text-sm font-semibold text-emerald-700 uppercase">Setup</p>
                <p class="mt-2 text-2xl font-semibold text-slate-900">$699 one-time</p>
                <p class="mt-2 text-sm text-slate-700">Domain, professional email, booking links, and a light landing page ready to share.</p>
                <a href="/contact" class="mt-4 inline-flex items-center justify-center px-4 py-2 bg-slate-900 text-white rounded-lg font-semibold hover:bg-emerald-700 transition">Start setup</a>
            </div>
            <div class="bg-slate-50 border border-slate-200 rounded-2xl p-6 shadow-sm">
                <p class="text-sm font-semibold text-emerald-700 uppercase">Care plans</p>
                <p class="mt-2 text-2xl font-semibold text-slate-900">From $99 / mo</p>
                <p class="mt-2 text-sm text-slate-700">Monthly check-ins, included sessions, and priority response. Cancel anytime.</p>
                <a href="/pricing" class="mt-4 inline-flex items-center justify-center px-4 py-2 bg-white text-slate-900 border border-slate-200 rounded-lg font-semibold hover:border-emerald-200 hover:text-emerald-700 transition">Explore care plans</a>
            </div>
        </div>
    </section>

    <section class="bg-slate-900 text-slate-50 rounded-3xl p-10 lg:p-12 shadow-lg border border-slate-800">
        <div class="max-w-3xl space-y-4">
            <h2 class="text-3xl sm:text-4xl font-semibold">Tech shouldn’t be exhausting.</h2>
            <p class="text-lg text-slate-200">Share what is draining your tech energy and we will respond with a calm plan, a time, and clear pricing. No pressure — just support.</p>
            <div class="flex flex-col sm:flex-row gap-4">
                <a href="/contact" class="inline-flex items-center justify-center px-5 py-3 bg-white text-slate-900 font-semibold rounded-lg shadow-sm hover:bg-emerald-50">Book a calm call</a>
                <a href="/pricing" class="inline-flex items-center justify-center px-5 py-3 bg-slate-800 text-white font-semibold rounded-lg border border-slate-700 hover:border-emerald-400">See what it costs</a>
            </div>
        </div>
    </section>
</div>
@endsection
