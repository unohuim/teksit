@extends('layouts.marketing')

@section('title', 'HappyTek — Easily Solved. Remote tech help across Canada')

@section('content')
<div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-16 sm:py-20 lg:py-24 space-y-16">
    <section class="grid lg:grid-cols-2 gap-12 items-center">
        <div class="space-y-6">
            <p class="text-sm font-semibold text-slate-700 uppercase tracking-wide">Remote tech help for Canada</p>
            <h1 class="text-3xl sm:text-4xl lg:text-5xl font-semibold text-slate-900 leading-tight">HappyTek — Easily Solved.</h1>
            <p class="text-lg text-slate-700">We fix the everyday tech that slows people down. From low tech energy households to founders and small teams, HappyTek keeps devices, accounts, and setups working without back-and-forth.</p>
            <div class="flex flex-col sm:flex-row gap-4">
                <a href="/contact" class="inline-flex items-center justify-center px-5 py-3 bg-slate-900 text-white font-semibold rounded-lg shadow-sm hover:bg-slate-800 transition">Get it fixed</a>
                <a href="/pricing" class="inline-flex items-center justify-center px-5 py-3 bg-white text-slate-900 font-semibold rounded-lg border border-slate-200 hover:border-slate-400">See pricing</a>
            </div>
            <div class="grid grid-cols-2 sm:grid-cols-3 gap-4 pt-2 text-sm text-slate-700">
                <div class="bg-white rounded-xl border border-slate-200/80 p-4 shadow-sm">
                    <p class="font-semibold text-slate-900">Handled quickly</p>
                    <p class="mt-1">Remote, secure help with clear next steps.</p>
                </div>
                <div class="bg-white rounded-xl border border-slate-200/80 p-4 shadow-sm">
                    <p class="font-semibold text-slate-900">For low tech energy</p>
                    <p class="mt-1">Plain language that respects any comfort level.</p>
                </div>
                <div class="bg-white rounded-xl border border-slate-200/80 p-4 shadow-sm">
                    <p class="font-semibold text-slate-900">For founders & teams</p>
                    <p class="mt-1">Setup and support that stays organized.</p>
                </div>
            </div>
        </div>
        <div class="bg-white border border-slate-200/80 rounded-2xl shadow-lg p-8 space-y-6">
            <div class="flex items-start gap-3">
                <div class="h-12 w-12 rounded-full bg-slate-900 text-white flex items-center justify-center font-semibold">HT</div>
                <div>
                    <p class="text-lg font-semibold text-slate-900">Your tech, finished properly</p>
                    <p class="text-sm text-slate-600">Scheduling, support, and follow-through in one place. We keep you posted and only access what you approve.</p>
                </div>
            </div>
            <ul class="space-y-4 text-slate-700 text-sm">
                <li class="flex items-start gap-3">
                    <span class="mt-1 h-2.5 w-2.5 rounded-full bg-slate-900"></span>
                    <span>Devices, accounts, Wi‑Fi, security, and light business setup handled remotely.</span>
                </li>
                <li class="flex items-start gap-3">
                    <span class="mt-1 h-2.5 w-2.5 rounded-full bg-slate-900"></span>
                    <span>Clear notes after every visit so seniors, caregivers, and teammates stay aligned.</span>
                </li>
                <li class="flex items-start gap-3">
                    <span class="mt-1 h-2.5 w-2.5 rounded-full bg-slate-900"></span>
                    <span>Predictable pricing — choose a visit, a setup, or an ongoing plan.</span>
                </li>
            </ul>
            <div class="bg-slate-50 border border-slate-200 rounded-xl p-4 text-sm text-slate-900">
                <p class="font-semibold">Low tech energy? We bring big tech energy.</p>
                <p class="mt-1">Show us what’s stuck. We’ll steady it, fix it, and hand back control.</p>
            </div>
        </div>
    </section>

    <section class="bg-white rounded-3xl border border-slate-200/80 shadow-sm p-8 lg:p-12 space-y-8">
        <div class="max-w-3xl space-y-3">
            <p class="text-sm font-semibold text-slate-700 uppercase">What HappyTek does</p>
            <h2 class="text-3xl font-semibold text-slate-900">Remote tech help that reduces friction.</h2>
            <p class="text-lg text-slate-700">We keep people connected and businesses presentable. No jargon — just the right moves in the right order.</p>
        </div>
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ([
                ['title' => 'Personal tech care', 'copy' => 'Email, video calls, passwords, and device tune-ups that work the way you expect.'],
                ['title' => 'Safe and secure', 'copy' => 'Two-factor, backups, and permission cleanup so households and teams stay protected.'],
                ['title' => 'Wi‑Fi & streaming', 'copy' => 'Router checks, printer sanity, smart TV setup, and better connections for everyday use.'],
                ['title' => 'Founder essentials', 'copy' => 'Domain, professional email, booking links, and light sites built without tool chaos.'],
                ['title' => 'Team workflows', 'copy' => 'Shared inboxes, calendars, and storage with one point of contact when things wobble.'],
                ['title' => 'Caregiver alignment', 'copy' => 'Written recaps and checklists so everyone knows what changed and what to do next.'],
            ] as $item)
                <div class="bg-slate-50 border border-slate-200 rounded-2xl p-6 shadow-sm">
                    <p class="font-semibold text-slate-900">{{ $item['title'] }}</p>
                    <p class="mt-2 text-sm text-slate-700">{{ $item['copy'] }}</p>
                </div>
            @endforeach
        </div>
    </section>

    <section class="grid lg:grid-cols-2 gap-10 items-start">
        <div class="space-y-4">
            <p class="text-sm font-semibold text-slate-700 uppercase">Who it’s for</p>
            <h2 class="text-3xl font-semibold text-slate-900">Built for people who want tech handled.</h2>
            <p class="text-lg text-slate-700">Seniors and their kids, caregivers, creatives, founders, realtors, solopreneurs, and small teams under ten. If tech energy feels low, we keep momentum high.</p>
            <div class="grid sm:grid-cols-2 gap-4">
                <div class="bg-white border border-slate-200 rounded-xl p-5 shadow-sm">
                    <p class="font-semibold text-slate-900">Households</p>
                    <p class="mt-2 text-sm text-slate-700">Friendly walkthroughs with notes you can keep. No guessing, no repeat calls.</p>
                </div>
                <div class="bg-white border border-slate-200 rounded-xl p-5 shadow-sm">
                    <p class="font-semibold text-slate-900">Independent pros</p>
                    <p class="mt-2 text-sm text-slate-700">Launch-ready tools with boundaries set — from inboxes to booking links.</p>
                </div>
                <div class="bg-white border border-slate-200 rounded-xl p-5 shadow-sm">
                    <p class="font-semibold text-slate-900">Small teams</p>
                    <p class="mt-2 text-sm text-slate-700">Shared systems tuned for speed. One partner to text when something stalls.</p>
                </div>
                <div class="bg-white border border-slate-200 rounded-xl p-5 shadow-sm">
                    <p class="font-semibold text-slate-900">Care circles</p>
                    <p class="mt-2 text-sm text-slate-700">We keep caregivers aligned with clear instructions and permission controls.</p>
                </div>
            </div>
        </div>
        <div class="bg-slate-900 text-slate-50 rounded-2xl p-6 lg:p-8 shadow-lg border border-slate-800 space-y-5">
            <h3 class="text-xl font-semibold">Low tech energy? Stay steady.</h3>
            <p class="text-sm text-slate-200">We move in plain language, confirm every step, and keep privacy intact. You focus on life while we handle the tech.</p>
            <div class="grid sm:grid-cols-2 gap-3 text-sm">
                <div class="bg-slate-800/60 border border-slate-700 rounded-xl p-4">
                    <p class="font-semibold">Respectful pace</p>
                    <p class="mt-1 text-slate-200">Screenshare, phone, or video — whatever feels easiest.</p>
                </div>
                <div class="bg-slate-800/60 border border-slate-700 rounded-xl p-4">
                    <p class="font-semibold">Documented fixes</p>
                    <p class="mt-1 text-slate-200">Short summaries keep family and coworkers in sync.</p>
                </div>
                <div class="bg-slate-800/60 border border-slate-700 rounded-xl p-4">
                    <p class="font-semibold">Predictable costs</p>
                    <p class="mt-1 text-slate-200">Clear rates upfront. No surprise add-ons.</p>
                </div>
                <div class="bg-slate-800/60 border border-slate-700 rounded-xl p-4">
                    <p class="font-semibold">Remote only</p>
                    <p class="mt-1 text-slate-200">Secure access with your permission every time.</p>
                </div>
            </div>
            <p class="text-sm font-semibold text-slate-100">Big tech energy. Easily solved.</p>
        </div>
    </section>

    <section class="grid lg:grid-cols-2 gap-10 items-start">
        <div class="bg-white border border-slate-200 rounded-2xl shadow-lg p-6 space-y-5">
            <h3 class="text-xl font-semibold text-slate-900">How it works</h3>
            <ol class="space-y-4 text-slate-700 text-sm">
                <li class="flex items-start gap-3">
                    <div class="h-7 w-7 flex items-center justify-center rounded-full bg-slate-900 text-white font-semibold">1</div>
                    <div>
                        <p class="font-semibold text-slate-900">Share the issue</p>
                        <p>Tell us what’s stuck and who’s involved. We set expectations right away.</p>
                    </div>
                </li>
                <li class="flex items-start gap-3">
                    <div class="h-7 w-7 flex items-center justify-center rounded-full bg-slate-900 text-white font-semibold">2</div>
                    <div>
                        <p class="font-semibold text-slate-900">Meet remotely</p>
                        <p>Phone, video, or screenshare. We drive while you approve each step.</p>
                    </div>
                </li>
                <li class="flex items-start gap-3">
                    <div class="h-7 w-7 flex items-center justify-center rounded-full bg-slate-900 text-white font-semibold">3</div>
                    <div>
                        <p class="font-semibold text-slate-900">Resolve and document</p>
                        <p>You leave with the fix complete, plus a short recap and next steps.</p>
                    </div>
                </li>
                <li class="flex items-start gap-3">
                    <div class="h-7 w-7 flex items-center justify-center rounded-full bg-slate-900 text-white font-semibold">4</div>
                    <div>
                        <p class="font-semibold text-slate-900">Stay supported</p>
                        <p>Book visits as needed or choose a plan. Everything stays predictable.</p>
                    </div>
                </li>
            </ol>
            <div class="bg-slate-50 border border-slate-200 rounded-xl p-4 text-sm text-slate-900">
                <p class="font-semibold">No tickets. No scripts.</p>
                <p class="mt-1">You work with one guide who knows your setup and keeps it consistent.</p>
            </div>
        </div>
        <div class="bg-white border border-slate-200/80 rounded-3xl shadow-sm p-8 lg:p-10 space-y-6">
            <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
                <div class="space-y-2 max-w-xl">
                    <p class="text-sm font-semibold text-slate-700 uppercase">Pricing preview</p>
                    <h2 class="text-3xl font-semibold text-slate-900">Clear options. No surprises.</h2>
                    <p class="text-lg text-slate-700">Choose a one-time visit, a setup, or a care plan. Every option is scoped before we start.</p>
                </div>
                <a href="/pricing" class="inline-flex items-center justify-center px-5 py-3 bg-slate-900 text-white font-semibold rounded-lg shadow-sm hover:bg-slate-800 transition">See full pricing</a>
            </div>
            <div class="grid md:grid-cols-3 gap-6">
                <div class="bg-slate-50 border border-slate-200 rounded-2xl p-6 shadow-sm">
                    <p class="text-sm font-semibold text-slate-700 uppercase">Session</p>
                    <p class="mt-2 text-2xl font-semibold text-slate-900">$129 / visit</p>
                    <p class="mt-2 text-sm text-slate-700">Direct help for the current issue. Seniors, caregivers, and busy founders welcome.</p>
                    <a href="/contact" class="mt-4 inline-flex items-center justify-center px-4 py-2 bg-slate-900 text-white rounded-lg font-semibold hover:bg-slate-800 transition">Book now</a>
                </div>
                <div class="bg-white border border-slate-200 rounded-2xl p-6 shadow-md">
                    <p class="text-sm font-semibold text-slate-700 uppercase">Setup</p>
                    <p class="mt-2 text-2xl font-semibold text-slate-900">$699 one-time</p>
                    <p class="mt-2 text-sm text-slate-700">Professional email, domain, booking, and a clean page ready to share with clients.</p>
                    <a href="/contact" class="mt-4 inline-flex items-center justify-center px-4 py-2 bg-slate-900 text-white rounded-lg font-semibold hover:bg-slate-800 transition">Start setup</a>
                </div>
                <div class="bg-slate-50 border border-slate-200 rounded-2xl p-6 shadow-sm">
                    <p class="text-sm font-semibold text-slate-700 uppercase">Care plans</p>
                    <p class="mt-2 text-2xl font-semibold text-slate-900">From $99 / mo</p>
                    <p class="mt-2 text-sm text-slate-700">Monthly check-ins, included sessions, and priority response for households and teams.</p>
                    <a href="/pricing" class="mt-4 inline-flex items-center justify-center px-4 py-2 bg-white text-slate-900 border border-slate-200 rounded-lg font-semibold hover:border-slate-400 transition">Explore plans</a>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-slate-900 text-slate-50 rounded-3xl p-10 lg:p-12 shadow-lg border border-slate-800">
        <div class="max-w-3xl space-y-4">
            <h2 class="text-3xl sm:text-4xl font-semibold">Your tech is handled. Easily solved.</h2>
            <p class="text-lg text-slate-200">Tell us what’s slowing you down. We reply with the plan, the price, and the earliest slot. No scripts, no waffle — just resolution.</p>
            <div class="flex flex-col sm:flex-row gap-4">
                <a href="/contact" class="inline-flex items-center justify-center px-5 py-3 bg-white text-slate-900 font-semibold rounded-lg shadow-sm hover:bg-slate-100">Get it fixed</a>
                <a href="/pricing" class="inline-flex items-center justify-center px-5 py-3 bg-slate-800 text-white font-semibold rounded-lg border border-slate-700 hover:border-slate-500">Review pricing</a>
            </div>
        </div>
    </section>
</div>
@endsection
