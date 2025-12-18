@extends('layouts.marketing')

@section('title', 'Contact HappyTek — We’ll guide you to the right help')

@section('content')
<section class="bg-white/70 backdrop-blur-sm py-16 sm:py-20">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 space-y-10">
        <div class="text-center space-y-4 max-w-2xl mx-auto">
            <span class="pill">Contact</span>
            <h1 class="text-3xl sm:text-4xl font-semibold text-[#0f1b2b]">Tell us what you need support with</h1>
            <p class="text-lg text-[#2b3f54]">A short note is enough. We’ll review, reply with the plan, and send a Calendly link to book.</p>
        </div>

        @if (session('status'))
            <div class="max-w-3xl mx-auto p-4 rounded-lg bg-green-50 border border-green-200 text-green-800">
                {{ session('status') }}
            </div>
        @endif

        <div class="grid gap-8 lg:grid-cols-3 lg:items-start">
            <div class="lg:col-span-2 muted-card shadow-md p-6 lg:p-8 space-y-6">
                <form action="{{ route('requests.store') }}" method="POST" class="space-y-5">
                    @csrf
                    <div class="grid sm:grid-cols-2 gap-4">
                        <div class="space-y-2">
                            <label for="name" class="block text-sm font-medium text-[#0f1b2b]">Name</label>
                            <input
                                id="name"
                                name="name"
                                type="text"
                                class="w-full rounded-lg border border-[#cfe0c5] bg-white px-4 py-2 text-[#0f1b2b] focus:border-[#1f65d1] focus:ring-[#1f65d1]"
                                placeholder="Your full name"
                                required
                            />
                        </div>
                        <div class="space-y-2">
                            <label for="email" class="block text-sm font-medium text-[#0f1b2b]">Email</label>
                            <input
                                id="email"
                                name="email"
                                type="email"
                                class="w-full rounded-lg border border-[#cfe0c5] bg-white px-4 py-2 text-[#0f1b2b] focus:border-[#1f65d1] focus:ring-[#1f65d1]"
                                placeholder="you@domain.com"
                                required
                            />
                        </div>
                    </div>

                    <div class="space-y-2">
                        <label for="phone" class="block text-sm font-medium text-[#0f1b2b]">Phone (optional)</label>
                        <input
                            id="phone"
                            name="phone"
                            type="text"
                            class="w-full rounded-lg border border-[#cfe0c5] bg-white px-4 py-2 text-[#0f1b2b] focus:border-[#1f65d1] focus:ring-[#1f65d1]"
                            placeholder="If you’d rather talk"
                        />
                    </div>

                    <div class="space-y-2">
                        <p class="block text-sm font-medium text-[#0f1b2b]">How should we help?</p>
                        <div class="grid sm:grid-cols-2 gap-3">
                            <label class="flex items-start gap-3 rounded-xl border border-[#cfe0c5] bg-white px-4 py-3 cursor-pointer hover:border-[#1f65d1]">
                                <input type="radio" name="path" value="fix_now" class="mt-1" checked>
                                <span>
                                    <span class="font-semibold text-[#0f1b2b]">Fix It Now</span>
                                    <p class="text-sm text-[#2b3f54]">Immediate help, billed hourly after payment.</p>
                                </span>
                            </label>
                            <label class="flex items-start gap-3 rounded-xl border border-[#cfe0c5] bg-white px-4 py-3 cursor-pointer hover:border-[#1f65d1]">
                                <input type="radio" name="path" value="plan_properly" class="mt-1">
                                <span>
                                    <span class="font-semibold text-[#0f1b2b]">Plan It Properly</span>
                                    <p class="text-sm text-[#2b3f54]">Scoped work with a quote, approval, and payment.</p>
                                </span>
                            </label>
                        </div>
                    </div>

                    <div class="space-y-2">
                        <label for="service_category" class="block text-sm font-medium text-[#0f1b2b]">Service category</label>
                        <select
                            id="service_category"
                            name="service_category"
                            class="w-full rounded-lg border border-[#cfe0c5] bg-white px-4 py-2 text-[#0f1b2b] focus:border-[#1f65d1] focus:ring-[#1f65d1]"
                            required
                        >
                            <option value="" disabled selected>Select a category</option>
                            <option value="Individuals">Individuals</option>
                            <option value="Professionals">Professionals</option>
                            <option value="Small Teams">Small Teams</option>
                            <option value="Project Concierge">Project Concierge</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>

                    <div class="space-y-2">
                        <label for="service_name" class="block text-sm font-medium text-[#0f1b2b]">What can we help with?</label>
                        <select
                            id="service_name"
                            name="service_name"
                            class="w-full rounded-lg border border-[#cfe0c5] bg-white px-4 py-2 text-[#0f1b2b] focus:border-[#1f65d1] focus:ring-[#1f65d1]"
                            required
                        >
                            <option value="" disabled selected>Pick the closest fit</option>
                            <option>Fix it Now</option>
                            <option>Setups</option>
                            <option>Wi-Fi &amp; Networkables</option>
                            <option>Security &amp; Passwords</option>
                            <option>Brand Launch Support</option>
                            <option>Migrations</option>
                            <option>Leads Mgmt &amp; Bookings</option>
                            <option>Automations &amp; Efficiency</option>
                            <option>AI Integrations</option>
                            <option>Onboarding Support</option>
                            <option>Cloud Migrations</option>
                            <option>Shared Info &amp; Collaboration</option>
                            <option>Tool Consolidation</option>
                            <option>Project Concierge</option>
                            <option>I just have a question</option>
                            <option>Not sure — need guidance</option>
                        </select>
                    </div>

                    <div class="space-y-2">
                        <label for="description" class="block text-sm font-medium text-[#0f1b2b]">Tell us what’s going on</label>
                        <textarea
                            id="description"
                            name="description"
                            rows="4"
                            class="w-full rounded-lg border border-[#cfe0c5] bg-white px-4 py-3 text-[#0f1b2b] focus:border-[#1f65d1] focus:ring-[#1f65d1]"
                            placeholder="A few sentences is fine. If you’re not sure, just describe the situation."
                            required
                        ></textarea>
                    </div>

                    <p class="text-sm text-[#2b3f54]">No scheduling or payment yet. We’ll review your request, confirm the plan, and send a booking link.</p>

                    <div class="pt-2">
                        <button type="submit" class="btn-primary w-full sm:w-auto">Send my request</button>
                    </div>
                </form>
            </div>

            <div class="card-surface shadow-sm p-6 space-y-5 lg:p-7 lg:space-y-6 lg:block hidden">
                <div class="space-y-2">
                    <h2 class="text-xl font-semibold text-[#0f1b2b]">What happens next</h2>
                    <p class="text-sm text-[#2b3f54]">Straightforward steps so you know what to expect.</p>
                </div>
                <ul class="space-y-3 text-sm text-[#2b3f54]">
                    <li class="flex gap-3">
                        <span class="accent-badge mt-1"></span>
                        <span>We review your request and confirm the best approach.</span>
                    </li>
                    <li class="flex gap-3">
                        <span class="accent-badge mt-1"></span>
                        <span>You receive pricing and next steps.</span>
                    </li>
                    <li class="flex gap-3">
                        <span class="accent-badge mt-1"></span>
                        <span>Scheduling happens via Calendly.</span>
                    </li>
                </ul>
                <div class="muted-card p-4 text-sm text-[#2b3f54] space-y-1">
                    <p class="font-semibold text-[#0f1b2b]">Prefer email or phone?</p>
                    <p>hello@happytek.ca</p>
                    <p>1-800-HAPPYTEK</p>
                </div>
                <div class="bg-gradient-to-br from-[#1f65d1] to-[#0f2f76] text-slate-50 rounded-xl p-4 text-sm space-y-1 shadow-md">
                    <p class="font-semibold">HappyTek — Easily Solved.</p>
                    <p class="text-slate-100/90">We keep your tech predictable, friendly, and finished.</p>
                </div>
            </div>
        </div>

        <div class="card-surface shadow-sm p-6 space-y-3 lg:hidden">
            <div class="space-y-2">
                <h2 class="text-xl font-semibold text-[#0f1b2b]">What happens next</h2>
                <p class="text-sm text-[#2b3f54]">Simple steps so you know what to expect.</p>
            </div>
            <ul class="space-y-2 text-sm text-[#2b3f54]">
                <li class="flex gap-3">
                    <span class="accent-badge mt-1"></span>
                    <span>We review your request and confirm the best approach.</span>
                </li>
                <li class="flex gap-3">
                    <span class="accent-badge mt-1"></span>
                    <span>You receive pricing and next steps.</span>
                </li>
                <li class="flex gap-3">
                    <span class="accent-badge mt-1"></span>
                    <span>Scheduling happens via Calendly.</span>
                </li>
            </ul>
        </div>
    </div>
</section>
@endsection
