@extends('layouts.marketing')

@section('title', 'Teksit Pricing | Simple remote tech help packages')

@section('content')
<section class="bg-white py-16 sm:py-20">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center space-y-4">
            <p class="text-sm font-semibold text-indigo-700 uppercase tracking-wide">Pricing</p>
            <h1 class="text-3xl sm:text-4xl font-semibold text-slate-900">Clear packages for remote tech help</h1>
            <p class="text-lg text-slate-700">All services are remote. No long-term contracts. Get exactly the level of help you need.</p>
        </div>

        <div class="mt-12 grid md:grid-cols-3 gap-6">
            <div class="bg-slate-50 border border-slate-200 rounded-2xl shadow-sm p-6 flex flex-col">
                <p class="text-sm font-semibold text-indigo-700 uppercase">Package 1</p>
                <h2 class="mt-2 text-xl font-semibold text-slate-900">Personal Tech Help (Seniors)</h2>
                <p class="mt-2 text-3xl font-semibold text-slate-900">$129 <span class="text-base font-medium text-slate-600">per session</span></p>
                <ul class="mt-4 space-y-2 text-sm text-slate-700 flex-1">
                    <li>Devices, email, printers, and security basics.</li>
                    <li>Patient walkthroughs with written steps.</li>
                    <li>Phone or Zoom — we stay until it works.</li>
                </ul>
                <a href="/contact" class="mt-6 inline-flex items-center justify-center px-4 py-2 bg-indigo-600 text-white font-semibold rounded-lg shadow hover:bg-indigo-500">Book a session</a>
            </div>

            <div class="bg-white border border-indigo-200 rounded-2xl shadow-lg p-6 flex flex-col">
                <p class="text-sm font-semibold text-indigo-700 uppercase">Package 2</p>
                <h2 class="mt-2 text-xl font-semibold text-slate-900">Realtor / Founder Setup</h2>
                <p class="mt-2 text-3xl font-semibold text-slate-900">$699 <span class="text-base font-medium text-slate-600">one-time</span></p>
                <ul class="mt-4 space-y-2 text-sm text-slate-700 flex-1">
                    <li>Domain registration or transfer.</li>
                    <li>Professional email with calendar + booking links.</li>
                    <li>Light landing page and hosting coordination.</li>
                </ul>
                <a href="/contact" class="mt-6 inline-flex items-center justify-center px-4 py-2 bg-indigo-600 text-white font-semibold rounded-lg shadow hover:bg-indigo-500">Get set up</a>
            </div>

            <div class="bg-slate-50 border border-slate-200 rounded-2xl shadow-sm p-6 flex flex-col">
                <p class="text-sm font-semibold text-indigo-700 uppercase">Package 3</p>
                <h2 class="mt-2 text-xl font-semibold text-slate-900">Ongoing Care Plans</h2>
                <p class="mt-2 text-3xl font-semibold text-slate-900">$99 / $149 / $249 <span class="text-base font-medium text-slate-600">per month</span></p>
                <ul class="mt-4 space-y-2 text-sm text-slate-700 flex-1">
                    <li>Monthly sessions included at each tier.</li>
                    <li>Priority response when something breaks.</li>
                    <li>Clear overage pricing per additional session.</li>
                </ul>
                <a href="/contact" class="mt-6 inline-flex items-center justify-center px-4 py-2 bg-indigo-600 text-white font-semibold rounded-lg shadow hover:bg-indigo-500">Start care plan</a>
            </div>
        </div>

        <div class="mt-10 bg-indigo-50 border border-indigo-100 rounded-2xl p-6 text-slate-900">
            <h3 class="text-lg font-semibold">What you can expect</h3>
            <ul class="mt-3 grid sm:grid-cols-2 gap-3 text-sm text-slate-800">
                <li>All services are remote — phone, Zoom, or secure screenshare.</li>
                <li>No long-term contracts. Pause or change plans anytime.</li>
                <li>Clear outcomes and written recaps after each session.</li>
                <li>Friendly support for seniors, realtors, founders, and small teams.</li>
            </ul>
        </div>
    </div>
</section>
@endsection
