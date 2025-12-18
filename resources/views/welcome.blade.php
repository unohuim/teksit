@extends('layouts.marketing')

@section('title', 'HappyTek — Easily Solved. Remote tech help across Canada')

@section('content')
@php
    $serviceGroups = [
        'Individuals' => [
            ['name' => 'Fix It Now', 'href' => url('/services/individuals/fix-it-now'), 'description' => 'Live, remote fixes for the device, account, or setting that stopped working.'],
            ['name' => 'Setups', 'href' => url('/services/individuals/setups'), 'description' => 'New device, email, or streaming setup with settings documented for you.'],
            ['name' => 'Wi-Fi & Networkables', 'href' => url('/services/individuals/wi-fi-and-networkables'), 'description' => 'Stronger connections, tidy routers, and printers that actually stay online.'],
            ['name' => 'Security & Passwords', 'href' => url('/services/individuals/security-and-passwords'), 'description' => 'Two-factor, backups, and password resets handled without locking you out.'],
        ],
        'Professionals' => [
            ['name' => 'Brand Launch Support', 'href' => url('/services/professionals/brand-launch-support'), 'description' => 'Domain, email, booking links, and a simple page that looks ready to hire.'],
            ['name' => 'Migrations', 'href' => url('/services/professionals/migrations'), 'description' => 'Move files, calendars, and inboxes without downtime or lost context.'],
            ['name' => 'Leads Mgmt & Bookings', 'href' => url('/services/professionals/leads-management-and-bookings'), 'description' => 'Booking links, intake forms, and reminders so prospects never slip.'],
            ['name' => 'Automations & Efficiency', 'href' => url('/services/professionals/automations-and-efficiency'), 'description' => 'Light automations that reduce copy-paste and keep your solo practice moving.'],
            ['name' => 'AI Integrations', 'href' => url('/services/professionals/ai-integrations'), 'description' => 'Practical AI add-ons for summaries, email drafts, and searchable notes.'],
        ],
        'Small Teams' => [
            ['name' => 'Onboarding Support', 'href' => url('/services/teams/onboarding-support'), 'description' => 'Day-one checklists, access, and devices set up so new hires ramp quickly.'],
            ['name' => 'Cloud Migrations', 'href' => url('/services/teams/cloud-migrations'), 'description' => 'Move shared storage, mail, and permissions with clean folders and labels.'],
            ['name' => 'Shared Info & Collaboration', 'href' => url('/services/teams/shared-info-and-collaboration'), 'description' => 'Calendars, shared inboxes, and channels that everyone can find and use.'],
            ['name' => 'Tool Consolidation', 'href' => url('/services/teams/tool-consolidation'), 'description' => 'Reduce overlapping apps, merge logins, and keep costs predictable.'],
            ['name' => 'AI Integrations', 'href' => url('/services/teams/ai-integrations'), 'description' => 'Searchable knowledge, meeting recaps, and safe AI copilots tuned for your work.'],
            ['name' => 'Project Concierge', 'href' => url('/services/teams/project-concierge'), 'description' => 'A named guide to coordinate tech steps with vendors, clients, and teammates.'],
        ],
    ];
@endphp

<div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-16 sm:py-20 lg:py-24 space-y-16">
    <section class="grid lg:grid-cols-2 gap-12 lg:gap-16 items-start">
        <div class="space-y-6">
            <span class="pill">Remote tech help for Canada</span>
            <h1 class="text-3xl sm:text-4xl lg:text-5xl font-semibold text-[#0f1b2b] leading-tight">Stuck tech? We finish the fix and keep you moving.</h1>
            <p class="text-lg text-[#2b3f54]">HappyTek steadies devices, accounts, and networks for households, seniors, and teams that need reliable help without the hassle.</p>
            <div class="flex flex-col lg:flex-row gap-4">
                <a href="/contact" class="btn-primary">Get it fixed</a>
                <a href="/pricing" class="btn-secondary">See pricing</a>
            </div>
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-4 pt-2 text-sm text-[#2b3f54]">
                <div class="card-surface p-4 h-full">
                    <p class="font-semibold text-[#0f1b2b]">Handled quickly</p>
                    <p class="mt-2">Remote, secure sessions with clear next steps and notes.</p>
                </div>
                <div class="card-surface p-4 h-full">
                    <p class="font-semibold text-[#0f1b2b]">Respects your pace</p>
                    <p class="mt-2">Plain language, patient walkthroughs, and zero jargon.</p>
                </div>
                <div class="card-surface p-4 h-full">
                    <p class="font-semibold text-[#0f1b2b]">Ready for work</p>
                    <p class="mt-2">Setups, clean handoffs, and documented changes for teams.</p>
                </div>
            </div>
        </div>
        <div class="card-surface border-[#d9e8d2] shadow-lg p-8 space-y-6">
            <div class="space-y-2">
                <p class="text-lg font-semibold text-[#0f1b2b]">What the tech?</p>
                <p class="text-sm text-[#2b3f54]">A calm landing spot for the broken, missing, or confusing. We sort the issue, keep you updated, and give back control.</p>
            </div>
            <ul class="space-y-4 text-[#2b3f54] text-sm">
                <li class="flex items-start gap-3">
                    <span class="accent-badge mt-1"></span>
                    <span>Devices, accounts, Wi‑Fi, security, and light business setup handled remotely.</span>
                </li>
                <li class="flex items-start gap-3">
                    <span class="accent-badge mt-1"></span>
                    <span>Clear recaps after every visit so seniors, caregivers, and teammates stay aligned.</span>
                </li>
                <li class="flex items-start gap-3">
                    <span class="accent-badge mt-1"></span>
                    <span>Predictable pricing — book a visit, a setup, or an ongoing plan.</span>
                </li>
            </ul>
            <div class="muted-card p-4 text-sm text-[#0f1b2b]">
                <p class="font-semibold">Tech Friction? We got Big Tech Energy.</p>
                <p class="mt-1">Show us what’s stuck. We’ll steady it, finish it, and hand back control.</p>
            </div>
        </div>
    </section>

    <section id="services" class="card-surface border-[#dbe7f8] shadow-md p-8 lg:p-12 space-y-8">
        <div class="flex flex-col lg:flex-row lg:items-start lg:justify-between gap-4">
            <div class="space-y-3 max-w-2xl">
                <span class="pill">Services</span>
                <h2 class="text-3xl font-semibold text-[#0f1b2b]">Pick the support that matches how you work.</h2>
                <p class="text-lg text-[#2b3f54]">Every service has a clear scope, a fast path to resolution, and a direct line back to HappyTek.</p>
            </div>
            <a href="/contact" class="btn-primary">Talk to us</a>
        </div>
        <div class="space-y-8">
            @foreach ($serviceGroups as $group => $services)
                <div class="space-y-4">
                    <div class="flex items-baseline justify-between">
                        <h3 class="text-xl font-semibold text-[#0f1b2b]">{{ $group }}</h3>
                        <a href="/contact" class="text-sm font-semibold text-[#1f65d1] hover:underline">Need help choosing?</a>
                    </div>
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
                        @foreach ($services as $service)
                            <a href="{{ $service['href'] }}" class="muted-card p-5 hover:border-[#dbe7f8] hover:shadow-md transition group">
                                <div class="flex items-start gap-3">
                                    <span class="accent-badge mt-1"></span>
                                    <div>
                                        <p class="font-semibold text-[#0f1b2b] group-hover:text-[#1f65d1]">{{ $service['name'] }}</p>
                                        <p class="mt-1 text-sm text-[#2b3f54]">{{ $service['description'] }}</p>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <section class="card-surface border-[#dbe7f8] shadow-md p-8 lg:p-12 space-y-8">
        <div class="max-w-3xl space-y-3">
            <span class="pill">What HappyTek does</span>
            <h2 class="text-3xl font-semibold text-[#0f1b2b]">Remote tech help that reduces friction.</h2>
            <p class="text-lg text-[#2b3f54]">We keep people connected and businesses presentable. No jargon — just the right moves in the right order.</p>
        </div>
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            @foreach ([
                ['title' => 'Personal tech care', 'copy' => 'Email, video calls, passwords, and device tune-ups that work the way you expect.'],
                ['title' => 'Safe and secure', 'copy' => 'Two-factor, backups, and permission cleanup so households and teams stay protected.'],
                ['title' => 'Wi‑Fi & streaming', 'copy' => 'Router checks, printer sanity, smart TV setup, and better connections for everyday use.'],
                ['title' => 'Founder essentials', 'copy' => 'Domain, professional email, booking links, and light sites built without tool chaos.'],
                ['title' => 'Team workflows', 'copy' => 'Shared inboxes, calendars, and storage with one point of contact when things wobble.'],
                ['title' => 'Caregiver alignment', 'copy' => 'Written recaps and checklists so everyone knows what changed and what to do next.'],
            ] as $item)
                <div class="muted-card p-6 shadow-sm">
                    <p class="font-semibold text-[#0f1b2b]">{{ $item['title'] }}</p>
                    <p class="mt-2 text-sm text-[#2b3f54]">{{ $item['copy'] }}</p>
                </div>
            @endforeach
        </div>
    </section>

    <section class="grid lg:grid-cols-2 gap-10 items-start">
        <div class="space-y-4">
            <span class="pill">Who it’s for</span>
            <h2 class="text-3xl font-semibold text-[#0f1b2b]">Built for people who want tech handled.</h2>
            <p class="text-lg text-[#2b3f54]">Seniors and their kids, caregivers, creatives, founders, realtors, solopreneurs, and small teams under ten. If tech energy feels low, we keep momentum high.</p>
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
                <div class="card-surface p-5">
                    <p class="font-semibold text-[#0f1b2b]">Households</p>
                    <p class="mt-2 text-sm text-[#2b3f54]">Friendly walkthroughs with notes you can keep. No guessing, no repeat calls.</p>
                </div>
                <div class="card-surface p-5">
                    <p class="font-semibold text-[#0f1b2b]">Independent pros</p>
                    <p class="mt-2 text-sm text-[#2b3f54]">Launch-ready tools with boundaries set — from inboxes to booking links.</p>
                </div>
                <div class="card-surface p-5">
                    <p class="font-semibold text-[#0f1b2b]">Small teams</p>
                    <p class="mt-2 text-sm text-[#2b3f54]">Shared systems tuned for speed. One partner to text when something stalls.</p>
                </div>
                <div class="card-surface p-5">
                    <p class="font-semibold text-[#0f1b2b]">Care circles</p>
                    <p class="mt-2 text-sm text-[#2b3f54]">We keep caregivers aligned with clear instructions and permission controls.</p>
                </div>
            </div>
        </div>
        <div class="bg-gradient-to-br from-[#1f65d1] via-[#184f9f] to-[#0f2f76] text-slate-50 rounded-2xl p-6 lg:p-8 shadow-lg border border-[#0d2a66] space-y-5">
            <h3 class="text-xl font-semibold">Low tech energy? Stay steady.</h3>
            <p class="text-sm text-slate-100/80">We move in plain language, confirm every step, and keep privacy intact. You focus on life while we handle the tech.</p>
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-3 text-sm">
                <div class="bg-white/10 border border-white/15 rounded-xl p-4">
                    <p class="font-semibold">Respectful pace</p>
                    <p class="mt-1 text-slate-100/90">Screenshare, phone, or video — whatever feels easiest.</p>
                </div>
                <div class="bg-white/10 border border-white/15 rounded-xl p-4">
                    <p class="font-semibold">Documented fixes</p>
                    <p class="mt-1 text-slate-100/90">Short summaries keep family and coworkers in sync.</p>
                </div>
                <div class="bg-white/10 border border-white/15 rounded-xl p-4">
                    <p class="font-semibold">Predictable costs</p>
                    <p class="mt-1 text-slate-100/90">Clear rates upfront. No surprise add-ons.</p>
                </div>
                <div class="bg-white/10 border border-white/15 rounded-xl p-4">
                    <p class="font-semibold">Remote only</p>
                    <p class="mt-1 text-slate-100/90">Secure access with your permission every time.</p>
                </div>
            </div>
            <p class="text-sm font-semibold text-white">Big tech energy. Easily solved.</p>
        </div>
    </section>

    <section class="grid lg:grid-cols-2 gap-10 items-start">
        <div class="card-surface p-6 space-y-5 border-[#e1f0d7] shadow-md">
            <h3 class="text-xl font-semibold text-[#0f1b2b]">How it works</h3>
            <ol class="space-y-4 text-[#2b3f54] text-sm">
                <li class="flex items-start gap-3">
                    <div class="h-7 w-7 flex items-center justify-center rounded-full bg-gradient-to-br from-[#6eb43f] to-[#1f65d1] text-white font-semibold">1</div>
                    <div>
                        <p class="font-semibold text-[#0f1b2b]">Share the issue</p>
                        <p>Tell us what’s stuck and who’s involved. We set expectations right away.</p>
                    </div>
                </li>
                <li class="flex items-start gap-3">
                    <div class="h-7 w-7 flex items-center justify-center rounded-full bg-gradient-to-br from-[#6eb43f] to-[#1f65d1] text-white font-semibold">2</div>
                    <div>
                        <p class="font-semibold text-[#0f1b2b]">Meet remotely</p>
                        <p>Phone, video, or screenshare. We drive while you approve each step.</p>
                    </div>
                </li>
                <li class="flex items-start gap-3">
                    <div class="h-7 w-7 flex items-center justify-center rounded-full bg-gradient-to-br from-[#6eb43f] to-[#1f65d1] text-white font-semibold">3</div>
                    <div>
                        <p class="font-semibold text-[#0f1b2b]">Resolve and document</p>
                        <p>You leave with the fix complete, plus a short recap and next steps.</p>
                    </div>
                </li>
                <li class="flex items-start gap-3">
                    <div class="h-7 w-7 flex items-center justify-center rounded-full bg-gradient-to-br from-[#6eb43f] to-[#1f65d1] text-white font-semibold">4</div>
                    <div>
                        <p class="font-semibold text-[#0f1b2b]">Stay supported</p>
                        <p>Book visits as needed or choose a plan. Everything stays predictable.</p>
                    </div>
                </li>
            </ol>
            <div class="muted-card p-4 text-sm text-[#0f1b2b]">
                <p class="font-semibold">No tickets. No scripts.</p>
                <p class="mt-1">You work with one guide who knows your setup and keeps it consistent.</p>
            </div>
        </div>
        <div class="card-surface border-[#dbe7f8] shadow-md p-8 lg:p-10 space-y-6">
            <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
                <div class="space-y-2 max-w-xl">
                    <span class="pill">Pricing preview</span>
                    <h2 class="text-3xl font-semibold text-[#0f1b2b]">Clear options. No surprises.</h2>
                    <p class="text-lg text-[#2b3f54]">Choose a one-time visit, a setup, or a care plan. Every option is scoped before we start.</p>
                </div>
                <a href="/pricing" class="btn-primary">See full pricing</a>
            </div>
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <div class="muted-card p-6 shadow-sm">
                    <p class="text-sm font-semibold text-[#215b3a] uppercase">Session</p>
                    <p class="mt-2 text-2xl font-semibold text-[#0f1b2b]">$129 / visit</p>
                    <p class="mt-2 text-sm text-[#2b3f54]">Direct help for the current issue. Seniors, caregivers, and busy founders welcome.</p>
                    <a href="/contact" class="mt-4 btn-primary w-full justify-center">Book now</a>
                </div>
                <div class="card-surface p-6 shadow-lg border-[#d9e8d2]">
                    <p class="text-sm font-semibold text-[#215b3a] uppercase">Setup</p>
                    <p class="mt-2 text-2xl font-semibold text-[#0f1b2b]">$699 one-time</p>
                    <p class="mt-2 text-sm text-[#2b3f54]">Professional email, domain, booking, and a clean page ready to share with clients.</p>
                    <a href="/contact" class="mt-4 btn-primary w-full justify-center">Start setup</a>
                </div>
                <div class="muted-card p-6 shadow-sm">
                    <p class="text-sm font-semibold text-[#215b3a] uppercase">Care plans</p>
                    <p class="mt-2 text-2xl font-semibold text-[#0f1b2b]">From $99 / mo</p>
                    <p class="mt-2 text-sm text-[#2b3f54]">Monthly check-ins, included sessions, and priority response for households and teams.</p>
                    <a href="/pricing" class="mt-4 btn-secondary w-full justify-center">Explore plans</a>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-gradient-to-br from-[#6eb43f] via-[#5b9c36] to-[#2a6f1f] text-white rounded-3xl p-10 lg:p-12 shadow-xl border border-[#5f9d40]">
        <div class="max-w-3xl space-y-4">
            <h2 class="text-3xl sm:text-4xl font-semibold">Your tech is handled. Easily solved.</h2>
            <p class="text-lg text-white/90">Tell us what’s slowing you down. We reply with the plan, the price, and the earliest slot. No scripts, no waffle — just resolution.</p>
            <div class="flex flex-col lg:flex-row gap-4">
                <a href="/contact" class="btn-secondary bg-white text-[#1f65d1] border-white">Get it fixed</a>
                <a href="/pricing" class="btn-secondary bg-transparent text-white border-white/70 hover:border-white">Review pricing</a>
            </div>
        </div>
    </section>
</div>
@endsection
