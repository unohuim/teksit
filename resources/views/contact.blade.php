@extends('layouts.marketing')

@section('title', 'Contact HappyTek | Book calm remote tech help')

@section('content')
<section class="bg-white py-16 sm:py-20">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 space-y-10">
        <div class="text-center space-y-4 max-w-2xl mx-auto">
            <p class="text-sm font-semibold text-emerald-700 uppercase tracking-wide">Book help</p>
            <h1 class="text-3xl sm:text-4xl font-semibold text-slate-900">Tell us what’s draining your tech energy</h1>
            <p class="text-lg text-slate-700">We reply within one business day with a calm plan, a time, and clear pricing. Everything happens remotely.</p>
        </div>

        <div class="grid lg:grid-cols-3 gap-8 items-start">
            <div class="lg:col-span-2 bg-slate-50 border border-slate-200 rounded-2xl shadow-sm p-6 lg:p-8">
                <form action="#" method="POST" class="space-y-5">
                    <div class="grid sm:grid-cols-2 gap-4">
                        <div>
                            <label for="name" class="block text-sm font-medium text-slate-900">Name</label>
                            <input id="name" name="name" type="text" class="mt-2 w-full rounded-lg border border-slate-300 bg-white px-4 py-2 text-slate-900 focus:border-emerald-500 focus:ring-emerald-500" placeholder="Your full name" />
                        </div>
                        <div>
                            <label for="email" class="block text-sm font-medium text-slate-900">Email</label>
                            <input id="email" name="email" type="email" class="mt-2 w-full rounded-lg border border-slate-300 bg-white px-4 py-2 text-slate-900 focus:border-emerald-500 focus:ring-emerald-500" placeholder="you@happytek.ca" />
                        </div>
                    </div>
                    <div>
                        <label for="phone" class="block text-sm font-medium text-slate-900">Phone (optional)</label>
                        <input id="phone" name="phone" type="text" class="mt-2 w-full rounded-lg border border-slate-300 bg-white px-4 py-2 text-slate-900 focus:border-emerald-500 focus:ring-emerald-500" placeholder="If you prefer a call" />
                    </div>
                    <div>
                        <label for="reason" class="block text-sm font-medium text-slate-900">How can we help?</label>
                        <textarea id="reason" name="reason" rows="4" class="mt-2 w-full rounded-lg border border-slate-300 bg-white px-4 py-2 text-slate-900 focus:border-emerald-500 focus:ring-emerald-500" placeholder="What’s not working or what do you want set up?"></textarea>
                    </div>
                    <div class="grid sm:grid-cols-2 gap-4">
                        <div>
                            <label for="comfort" class="block text-sm font-medium text-slate-900">Comfort level with tech</label>
                            <select id="comfort" name="comfort" class="mt-2 w-full rounded-lg border border-slate-300 bg-white px-4 py-2 text-slate-900 focus:border-emerald-500 focus:ring-emerald-500">
                                <option>Low tech energy – please go slow</option>
                                <option>Average – I can follow steps</option>
                                <option>Confident – just need it done</option>
                            </select>
                        </div>
                        <div>
                            <label for="timing" class="block text-sm font-medium text-slate-900">Timing preference</label>
                            <select id="timing" name="timing" class="mt-2 w-full rounded-lg border border-slate-300 bg-white px-4 py-2 text-slate-900 focus:border-emerald-500 focus:ring-emerald-500">
                                <option>Earliest available</option>
                                <option>This week</option>
                                <option>Next week</option>
                                <option>Morning is best</option>
                                <option>Afternoon is best</option>
                            </select>
                        </div>
                    </div>
                    <p class="text-sm text-slate-600">No payment is collected here. We schedule first, confirm the plan together, and only proceed when you feel clear.</p>
                    <button type="submit" class="inline-flex items-center justify-center px-5 py-3 bg-slate-900 text-white font-semibold rounded-lg shadow-sm hover:bg-emerald-700 transition">Send my request</button>
                </form>
            </div>
            <div class="space-y-4 bg-white border border-emerald-100 rounded-2xl p-6 shadow-sm">
                <h2 class="text-xl font-semibold text-slate-900">What happens next</h2>
                <ul class="space-y-3 text-sm text-slate-800">
                    <li class="flex gap-3">
                        <span class="mt-1 h-2.5 w-2.5 rounded-full bg-emerald-500"></span>
                        <span>We reply with a suggested time and what to have nearby.</span>
                    </li>
                    <li class="flex gap-3">
                        <span class="mt-1 h-2.5 w-2.5 rounded-full bg-emerald-500"></span>
                        <span>Sessions are remote via phone or Zoom — whichever feels easier.</span>
                    </li>
                    <li class="flex gap-3">
                        <span class="mt-1 h-2.5 w-2.5 rounded-full bg-emerald-500"></span>
                        <span>Afterward, you receive a plain-language recap to share with family or teammates.</span>
                    </li>
                </ul>
                <div class="pt-4 border-t border-emerald-100 space-y-2 text-sm text-slate-800">
                    <p class="font-semibold text-slate-900">Prefer email or phone?</p>
                    <p>hello@happytek.ca</p>
                    <p>1-800-HAPPYTEK</p>
                </div>
                <div class="bg-slate-50 border border-slate-200 rounded-xl p-4 text-sm text-slate-800 space-y-2">
                    <p class="font-semibold text-slate-900">Availability</p>
                    <p>Monday to Friday, 9am–6pm ET. Limited weekend spots by request.</p>
                    <p class="text-emerald-700 font-medium">Need us sooner? Mention it and we’ll prioritize.</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
