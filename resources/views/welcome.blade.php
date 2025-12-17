@extends('layouts.marketing')

@section('title', 'Teksit | Remote tech concierge for seniors, realtors, founders, and small teams')

@section('content')
<div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-16 sm:py-20 lg:py-24">
    <section class="grid lg:grid-cols-2 gap-12 items-center">
        <div class="space-y-6">
            <p class="text-sm font-semibold text-indigo-700 uppercase tracking-wide">Remote tech concierge</p>
            <h1 class="text-3xl sm:text-4xl lg:text-5xl font-semibold text-slate-900 leading-tight">Your personal tech person — without the stress.</h1>
            <p class="text-lg text-slate-700">Calm, patient tech help for seniors, realtors, founders, and small teams. Everything happens remotely by phone or video — in plain language you can trust.</p>
            <div class="flex flex-col sm:flex-row gap-4">
                <a href="/contact" class="inline-flex items-center justify-center px-5 py-3 bg-indigo-600 text-white font-semibold rounded-lg shadow hover:bg-indigo-500">Book help</a>
                <a href="/pricing" class="inline-flex items-center justify-center px-5 py-3 bg-white text-slate-900 font-semibold rounded-lg border border-slate-200 hover:border-indigo-200 hover:text-indigo-700">View packages</a>
            </div>
            <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 pt-6 text-sm text-slate-600">
                <div class="bg-white rounded-xl border border-slate-200 p-4 shadow-sm">
                    <p class="font-semibold text-slate-900">Seniors</p>
                    <p class="mt-1">Patient, 1:1 help with devices and accounts.</p>
                </div>
                <div class="bg-white rounded-xl border border-slate-200 p-4 shadow-sm">
                    <p class="font-semibold text-slate-900">Realtors</p>
                    <p class="mt-1">Ready-to-send listings, calendar, and booking links.</p>
                </div>
                <div class="bg-white rounded-xl border border-slate-200 p-4 shadow-sm">
                    <p class="font-semibold text-slate-900">Founders</p>
                    <p class="mt-1">Set up the essentials without wrestling with tools.</p>
                </div>
                <div class="bg-white rounded-xl border border-slate-200 p-4 shadow-sm">
                    <p class="font-semibold text-slate-900">Small teams</p>
                    <p class="mt-1">Shared email, cloud, and support so work stays moving.</p>
                </div>
            </div>
        </div>
        <div class="bg-white border border-slate-200 rounded-2xl shadow-lg p-8 space-y-6">
            <div class="flex items-center gap-3">
                <div class="h-12 w-12 rounded-full bg-indigo-50 text-indigo-700 flex items-center justify-center font-semibold">Remote</div>
                <div>
                    <p class="text-lg font-semibold text-slate-900">We meet you where you are</p>
                    <p class="text-sm text-slate-600">Phone, Zoom, or screenshare — always remote and privacy-first.</p>
                </div>
            </div>
            <ul class="space-y-4 text-slate-700 text-sm">
                <li class="flex items-start gap-3">
                    <span class="mt-1 h-2.5 w-2.5 rounded-full bg-emerald-500"></span>
                    <span>Hands-on setup without confusing jargon.</span>
                </li>
                <li class="flex items-start gap-3">
                    <span class="mt-1 h-2.5 w-2.5 rounded-full bg-emerald-500"></span>
                    <span>Clear outcomes: working email, calendars, devices, and backups.</span>
                </li>
                <li class="flex items-start gap-3">
                    <span class="mt-1 h-2.5 w-2.5 rounded-full bg-emerald-500"></span>
                    <span>One friendly person to text when something goes sideways.</span>
                </li>
            </ul>
            <div class="bg-indigo-50 border border-indigo-100 rounded-xl p-4 text-sm text-indigo-900">
                <p class="font-semibold">New to Teksit?</p>
                <p class="mt-1">Start with a single session. If you need more, we credit it toward any package.</p>
            </div>
        </div>
    </section>
</div>

<section class="bg-white py-16 sm:py-20 border-t border-slate-200">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-2xl">
            <h2 class="text-3xl font-semibold text-slate-900">Who it's for</h2>
            <p class="mt-3 text-lg text-slate-700">Simple, remote tech help tailored to the people who keep things running.</p>
        </div>
        <div class="mt-10 grid md:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="bg-slate-50 border border-slate-200 rounded-xl p-5 shadow-sm">
                <p class="font-semibold text-slate-900">Seniors</p>
                <p class="mt-2 text-sm text-slate-700">From "my email disappeared" to "how do I join a video call?" — we fix it live and teach you at your pace.</p>
                <p class="mt-3 text-sm font-medium text-emerald-700">Outcome: confidence using your phone, tablet, or laptop.</p>
            </div>
            <div class="bg-slate-50 border border-slate-200 rounded-xl p-5 shadow-sm">
                <p class="font-semibold text-slate-900">Realtors</p>
                <p class="mt-2 text-sm text-slate-700">Professional email, calendar, and booking links that make you reachable without the tech headaches.</p>
                <p class="mt-3 text-sm font-medium text-emerald-700">Outcome: polished client communications and fewer missed messages.</p>
            </div>
            <div class="bg-slate-50 border border-slate-200 rounded-xl p-5 shadow-sm">
                <p class="font-semibold text-slate-900">Founders</p>
                <p class="mt-2 text-sm text-slate-700">Get the basics live fast: domain, email, simple site, and file sharing without spending days configuring tools.</p>
                <p class="mt-3 text-sm font-medium text-emerald-700">Outcome: ready-to-use stack so you can focus on the business.</p>
            </div>
            <div class="bg-slate-50 border border-slate-200 rounded-xl p-5 shadow-sm">
                <p class="font-semibold text-slate-900">Small teams</p>
                <p class="mt-2 text-sm text-slate-700">Shared inboxes, calendars, and cloud storage with someone to call when things break.</p>
                <p class="mt-3 text-sm font-medium text-emerald-700">Outcome: everyone working from the same playbook with fast support.</p>
            </div>
        </div>
    </div>
</section>

<section class="py-16 sm:py-20 bg-slate-50">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-10 items-start">
            <div>
                <h2 class="text-3xl font-semibold text-slate-900">Core services</h2>
                <p class="mt-3 text-lg text-slate-700">Everything you need to stay connected and organized — without hiring an agency.</p>
                <div class="mt-8 grid sm:grid-cols-2 gap-4">
                    @foreach ([
                        ['title' => 'Personal tech help', 'copy' => 'On-demand guidance for devices, apps, and day-to-day issues.'],
                        ['title' => 'Email / calendar / device setup', 'copy' => 'We configure it with you, confirm it works, and leave written steps.'],
                        ['title' => 'Domain + professional email', 'copy' => 'Claim your domain and set up inboxes that land in the inbox, not spam.'],
                        ['title' => 'Cloud-based business setup', 'copy' => 'Shared drives, backups, and permissions that protect your files.'],
                        ['title' => 'Light website / hosting bridge', 'copy' => 'A simple, reliable site with us managing the technical pieces.'],
                        ['title' => 'Ongoing care & support', 'copy' => 'Regular check-ins, monitoring, and quick response when things break.'],
                    ] as $item)
                        <div class="bg-white border border-slate-200 rounded-xl p-5 shadow-sm">
                            <p class="font-semibold text-slate-900">{{ $item['title'] }}</p>
                            <p class="mt-2 text-sm text-slate-700">{{ $item['copy'] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="bg-white border border-slate-200 rounded-2xl shadow-lg p-6 space-y-5">
                <h3 class="text-xl font-semibold text-slate-900">How it works</h3>
                <ol class="space-y-4 text-slate-700 text-sm">
                    <li class="flex items-start gap-3">
                        <div class="h-7 w-7 flex items-center justify-center rounded-full bg-indigo-600 text-white font-semibold">1</div>
                        <div>
                            <p class="font-semibold text-slate-900">Book</p>
                            <p>Choose a time that works for you. We confirm details by email.</p>
                        </div>
                    </li>
                    <li class="flex items-start gap-3">
                        <div class="h-7 w-7 flex items-center justify-center rounded-full bg-indigo-600 text-white font-semibold">2</div>
                        <div>
                            <p class="font-semibold text-slate-900">Meet</p>
                            <p>We connect by phone or Zoom, share screens if needed, and get oriented.</p>
                        </div>
                    </li>
                    <li class="flex items-start gap-3">
                        <div class="h-7 w-7 flex items-center justify-center rounded-full bg-indigo-600 text-white font-semibold">3</div>
                        <div>
                            <p class="font-semibold text-slate-900">Fixed outcome</p>
                            <p>You leave with the problem solved or the setup completed — not a to-do list.</p>
                        </div>
                    </li>
                    <li class="flex items-start gap-3">
                        <div class="h-7 w-7 flex items-center justify-center rounded-full bg-indigo-600 text-white font-semibold">4</div>
                        <div>
                            <p class="font-semibold text-slate-900">Optional ongoing care</p>
                            <p>Stay covered with monthly care plans that include check-ins and priority support.</p>
                        </div>
                    </li>
                </ol>
                <div class="bg-indigo-50 border border-indigo-100 rounded-xl p-4 text-sm text-indigo-900">
                    <p class="font-semibold">Always remote</p>
                    <p class="mt-1">Secure support across Canada. We work alongside you, not on your computer without consent.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-16 sm:py-20 bg-white">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6">
            <div>
                <h2 class="text-3xl font-semibold text-slate-900">Pricing preview</h2>
                <p class="mt-3 text-lg text-slate-700">Three clear options, all remote. Start small or roll into ongoing care.</p>
            </div>
            <a href="/pricing" class="inline-flex items-center justify-center px-5 py-3 bg-indigo-600 text-white font-semibold rounded-lg shadow hover:bg-indigo-500">See full pricing</a>
        </div>
        <div class="mt-10 grid md:grid-cols-3 gap-6">
            <div class="bg-slate-50 border border-slate-200 rounded-xl p-6 shadow-sm">
                <p class="text-sm font-semibold text-indigo-700 uppercase">Personal Tech Help</p>
                <p class="mt-2 text-2xl font-semibold text-slate-900">$129 / session</p>
                <p class="mt-2 text-sm text-slate-700">Great for seniors or one-off fixes. Devices, email, printers, security basics.</p>
                <a href="/contact" class="mt-4 inline-flex items-center justify-center px-4 py-2 bg-indigo-600 text-white rounded-lg font-semibold hover:bg-indigo-500">Book a session</a>
            </div>
            <div class="bg-slate-50 border border-slate-200 rounded-xl p-6 shadow-sm">
                <p class="text-sm font-semibold text-indigo-700 uppercase">Realtor / Founder Setup</p>
                <p class="mt-2 text-2xl font-semibold text-slate-900">$699 one-time</p>
                <p class="mt-2 text-sm text-slate-700">Domain, professional email, calendar + booking, and a light landing page.</p>
                <a href="/contact" class="mt-4 inline-flex items-center justify-center px-4 py-2 bg-indigo-600 text-white rounded-lg font-semibold hover:bg-indigo-500">Get set up</a>
            </div>
            <div class="bg-slate-50 border border-slate-200 rounded-xl p-6 shadow-sm">
                <p class="text-sm font-semibold text-indigo-700 uppercase">Ongoing Care Plans</p>
                <p class="mt-2 text-2xl font-semibold text-slate-900">$99 / $149 / $249</p>
                <p class="mt-2 text-sm text-slate-700">Monthly tiers with included sessions and fast response. Clear overage pricing.</p>
                <a href="/pricing" class="mt-4 inline-flex items-center justify-center px-4 py-2 bg-indigo-600 text-white rounded-lg font-semibold hover:bg-indigo-500">Start a plan</a>
            </div>
        </div>
    </div>
</section>

<section class="py-16 sm:py-20 bg-slate-50">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-10">
            <div>
                <h2 class="text-3xl font-semibold text-slate-900">Trust & reassurance</h2>
                <p class="mt-3 text-lg text-slate-700">Friendly, calm support designed for people who do not want to think about tech.</p>
                <ul class="mt-6 space-y-3 text-slate-700">
                    <li class="flex items-start gap-3">
                        <span class="mt-2 h-2.5 w-2.5 rounded-full bg-emerald-500"></span>
                        <div>
                            <p class="font-semibold text-slate-900">Remote-only</p>
                            <p>No need to schedule in-person visits — everything happens online or by phone.</p>
                        </div>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="mt-2 h-2.5 w-2.5 rounded-full bg-emerald-500"></span>
                        <div>
                            <p class="font-semibold text-slate-900">No jargon</p>
                            <p>Plain-language explanations and written steps you can keep.</p>
                        </div>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="mt-2 h-2.5 w-2.5 rounded-full bg-emerald-500"></span>
                        <div>
                            <p class="font-semibold text-slate-900">Privacy-first</p>
                            <p>We only access what you approve and show you how to stay secure.</p>
                        </div>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="mt-2 h-2.5 w-2.5 rounded-full bg-emerald-500"></span>
                        <div>
                            <p class="font-semibold text-slate-900">No contracts</p>
                            <p>Use us once or keep us on standby. You choose when you need help.</p>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="bg-white border border-slate-200 rounded-2xl shadow-lg p-6 space-y-6">
                <h3 class="text-xl font-semibold text-slate-900">Ready when you are</h3>
                <p class="text-slate-700">Pick a time, tell us what you need, and we will guide you every step of the way.</p>
                <div class="grid sm:grid-cols-2 gap-4 text-sm text-slate-700">
                    <div class="bg-indigo-50 border border-indigo-100 rounded-xl p-4">
                        <p class="font-semibold text-indigo-900">Same-week availability</p>
                        <p class="mt-1">Most sessions happen within 2 business days.</p>
                    </div>
                    <div class="bg-indigo-50 border border-indigo-100 rounded-xl p-4">
                        <p class="font-semibold text-indigo-900">Written recaps</p>
                        <p class="mt-1">You get clear notes and next steps after each call.</p>
                    </div>
                </div>
                <div class="flex flex-col sm:flex-row gap-3">
                    <a href="/contact" class="inline-flex items-center justify-center px-4 py-2 bg-indigo-600 text-white rounded-lg font-semibold hover:bg-indigo-500">Book help</a>
                    <a href="/pricing" class="inline-flex items-center justify-center px-4 py-2 border border-slate-200 rounded-lg font-semibold text-slate-900 hover:border-indigo-200 hover:text-indigo-700">See pricing</a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-16 sm:py-20 bg-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-4">
        <h2 class="text-3xl sm:text-4xl font-semibold text-slate-900">Let’s make tech feel calm again.</h2>
        <p class="text-lg text-slate-700">Tell us what’s going on and we’ll reply with a plan, a time, and clear pricing. No pressure, no contracts.</p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="/contact" class="inline-flex items-center justify-center px-5 py-3 bg-indigo-600 text-white font-semibold rounded-lg shadow hover:bg-indigo-500">Book help</a>
            <a href="/pricing" class="inline-flex items-center justify-center px-5 py-3 bg-white text-slate-900 font-semibold rounded-lg border border-slate-200 hover:border-indigo-200 hover:text-indigo-700">View packages</a>
        </div>
    </div>
</section>
@endsection
