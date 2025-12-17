@extends('layouts.marketing')

@section('title', 'Contact Teksit | Book remote tech help')

@section('content')
<section class="bg-white py-16 sm:py-20">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center space-y-4">
            <p class="text-sm font-semibold text-indigo-700 uppercase tracking-wide">Book help</p>
            <h1 class="text-3xl sm:text-4xl font-semibold text-slate-900">Tell us what you need</h1>
            <p class="text-lg text-slate-700">We respond within one business day. All sessions happen remotely by phone or Zoom.</p>
        </div>

        <div class="mt-10 grid lg:grid-cols-3 gap-8 items-start">
            <div class="lg:col-span-2 bg-slate-50 border border-slate-200 rounded-2xl shadow-sm p-6">
                <form action="#" method="POST" class="space-y-4">
                    <div>
                        <label for="name" class="block text-sm font-medium text-slate-900">Name</label>
                        <input id="name" name="name" type="text" class="mt-2 w-full rounded-lg border border-slate-300 bg-white px-4 py-2 text-slate-900 focus:border-indigo-500 focus:ring-indigo-500" placeholder="Your full name" />
                    </div>
                    <div>
                        <label for="email" class="block text-sm font-medium text-slate-900">Email</label>
                        <input id="email" name="email" type="email" class="mt-2 w-full rounded-lg border border-slate-300 bg-white px-4 py-2 text-slate-900 focus:border-indigo-500 focus:ring-indigo-500" placeholder="you@example.com" />
                    </div>
                    <div>
                        <label for="reason" class="block text-sm font-medium text-slate-900">Reason for help</label>
                        <textarea id="reason" name="reason" rows="4" class="mt-2 w-full rounded-lg border border-slate-300 bg-white px-4 py-2 text-slate-900 focus:border-indigo-500 focus:ring-indigo-500" placeholder="What are you trying to fix or set up?" ></textarea>
                    </div>
                    <p class="text-sm text-slate-600">No payment is collected here. We schedule a time first, then confirm the plan and price together.</p>
                    <button type="submit" class="inline-flex items-center justify-center px-5 py-3 bg-indigo-600 text-white font-semibold rounded-lg shadow hover:bg-indigo-500">Submit request</button>
                </form>
            </div>
            <div class="space-y-4 bg-indigo-50 border border-indigo-100 rounded-2xl p-6">
                <h2 class="text-xl font-semibold text-indigo-900">What happens next</h2>
                <ul class="space-y-2 text-sm text-indigo-900">
                    <li>We reply with a suggested time and what to have ready.</li>
                    <li>You’ll meet by phone or Zoom — whichever feels easier.</li>
                    <li>After the session, you receive a plain-language recap.</li>
                </ul>
                <div class="pt-4 border-t border-indigo-100 space-y-2 text-sm text-indigo-900">
                    <p class="font-semibold">Prefer email or phone?</p>
                    <p>hello@teksit.ca</p>
                    <p>1-800-TEKSIT-CA</p>
                </div>
                <div class="bg-white border border-indigo-100 rounded-xl p-4 text-sm text-indigo-900">
                    <p class="font-semibold">Availability</p>
                    <p class="mt-1">Monday to Friday, 9am–6pm ET. Limited weekend spots by request.</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
