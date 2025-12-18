@extends('layouts.marketing')

@section('title', 'Contact HappyTek — Book remote help that is easily solved')

@section('content')
<section class="bg-white/70 backdrop-blur-sm py-16 sm:py-20">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 space-y-10">
        <div class="text-center space-y-4 max-w-2xl mx-auto">
            <span class="pill">Book help</span>
            <h1 class="text-3xl sm:text-4xl font-semibold text-[#0f1b2b]">Tell us what needs to be fixed</h1>
            <p class="text-lg text-[#2b3f54]">We respond within one business day with the plan, the price, and the earliest time. Your tech stays remote and in your control.</p>
        </div>

        <div class="grid lg:grid-cols-3 gap-8 items-start">
            <div class="lg:col-span-2 muted-card shadow-md p-6 lg:p-8">
                <form action="#" method="POST" class="space-y-5">
                    <div class="grid sm:grid-cols-2 gap-4">
                        <div>
                            <label for="name" class="block text-sm font-medium text-[#0f1b2b]">Name</label>
                            <input id="name" name="name" type="text" class="mt-2 w-full rounded-lg border border-[#cfe0c5] bg-white px-4 py-2 text-[#0f1b2b] focus:border-[#1f65d1] focus:ring-[#1f65d1]" placeholder="Your full name" />
                        </div>
                        <div>
                            <label for="email" class="block text-sm font-medium text-[#0f1b2b]">Email</label>
                            <input id="email" name="email" type="email" class="mt-2 w-full rounded-lg border border-[#cfe0c5] bg-white px-4 py-2 text-[#0f1b2b] focus:border-[#1f65d1] focus:ring-[#1f65d1]" placeholder="you@happytek.ca" />
                        </div>
                    </div>
                    <div>
                        <label for="phone" class="block text-sm font-medium text-[#0f1b2b]">Phone (optional)</label>
                        <input id="phone" name="phone" type="text" class="mt-2 w-full rounded-lg border border-[#cfe0c5] bg-white px-4 py-2 text-[#0f1b2b] focus:border-[#1f65d1] focus:ring-[#1f65d1]" placeholder="If you prefer a call" />
                    </div>
                    <div>
                        <label for="reason" class="block text-sm font-medium text-[#0f1b2b]">What needs attention?</label>
                        <textarea id="reason" name="reason" rows="4" class="mt-2 w-full rounded-lg border border-[#cfe0c5] bg-white px-4 py-2 text-[#0f1b2b] focus:border-[#1f65d1] focus:ring-[#1f65d1]" placeholder="Wi‑Fi, email, setup, devices, or anything that is slowing you down."></textarea>
                    </div>
                    <div class="grid sm:grid-cols-2 gap-4">
                        <div>
                            <label for="comfort" class="block text-sm font-medium text-[#0f1b2b]">Comfort level with tech</label>
                            <select id="comfort" name="comfort" class="mt-2 w-full rounded-lg border border-[#cfe0c5] bg-white px-4 py-2 text-[#0f1b2b] focus:border-[#1f65d1] focus:ring-[#1f65d1]">
                                <option>Low tech energy – take it step by step</option>
                                <option>Average – I can follow along</option>
                                <option>Confident – just get it done</option>
                            </select>
                        </div>
                        <div>
                            <label for="timing" class="block text-sm font-medium text-[#0f1b2b]">Timing preference</label>
                            <select id="timing" name="timing" class="mt-2 w-full rounded-lg border border-[#cfe0c5] bg-white px-4 py-2 text-[#0f1b2b] focus:border-[#1f65d1] focus:ring-[#1f65d1]">
                                <option>Earliest available</option>
                                <option>This week</option>
                                <option>Next week</option>
                                <option>Morning is best</option>
                                <option>Afternoon is best</option>
                            </select>
                        </div>
                    </div>
                    <p class="text-sm text-[#2b3f54]">No payment is collected here. We confirm the plan, schedule the session, and only proceed when you approve.</p>
                    <button type="submit" class="btn-primary">Send my request</button>
                </form>
            </div>
            <div class="card-surface shadow-sm p-6 space-y-4">
                <h2 class="text-xl font-semibold text-[#0f1b2b]">What happens next</h2>
                <ul class="space-y-3 text-sm text-[#2b3f54]">
                    <li class="flex gap-3">
                        <span class="accent-badge mt-1"></span>
                        <span>We reply with the plan, pricing, and a time that fits.</span>
                    </li>
                    <li class="flex gap-3">
                        <span class="accent-badge mt-1"></span>
                        <span>Sessions are remote via phone, video, or secure screenshare.</span>
                    </li>
                    <li class="flex gap-3">
                        <span class="accent-badge mt-1"></span>
                        <span>Afterward, you get a brief recap to keep everyone aligned.</span>
                    </li>
                </ul>
                <div class="pt-4 border-t border-[#dbe7f8] space-y-2 text-sm text-[#2b3f54]">
                    <p class="font-semibold text-[#0f1b2b]">Prefer email or phone?</p>
                    <p>hello@happytek.ca</p>
                    <p>1-800-HAPPYTEK</p>
                </div>
                <div class="muted-card p-4 text-sm text-[#2b3f54] space-y-2">
                    <p class="font-semibold text-[#0f1b2b]">Availability</p>
                    <p>Monday to Friday, 9am–6pm ET. Limited weekend spots by request.</p>
                    <p class="text-[#0f1b2b] font-medium">Need it sooner? Mention it and we’ll prioritize.</p>
                </div>
                <div class="bg-gradient-to-br from-[#1f65d1] to-[#0f2f76] text-slate-50 rounded-xl p-4 text-sm space-y-1 shadow-md">
                    <p class="font-semibold">HappyTek — Easily Solved.</p>
                    <p class="text-slate-100/90">Remote tech help that stays predictable and finished.</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
