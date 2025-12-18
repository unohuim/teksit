@extends('layouts.marketing')

@section('title', 'Fix It Now — HappyTek')

@section('content')
<div class="py-16 sm:py-24">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white border border-[#d9e8d2] rounded-2xl shadow-sm p-8 sm:p-12 space-y-6">
            <div class="space-y-3">
                <p class="text-xs font-semibold uppercase text-[#1f65d1] tracking-wide">Immediate Support</p>
                <h1 class="text-3xl sm:text-4xl font-bold text-[#0f1b2b]">Fix it now</h1>
                <p class="text-lg text-[#234567]">One focused session to resolve a single issue remotely. Time-boxed, outcome driven, and ready when you are.</p>
            </div>
            <div class="grid gap-4 sm:grid-cols-2">
                <div class="space-y-2">
                    <h2 class="text-base font-semibold text-[#0f1b2b]">What to expect</h2>
                    <ul class="list-disc list-inside text-[#234567] space-y-1">
                        <li>One issue per session</li>
                        <li>Remote support</li>
                        <li>Time-boxed and focused</li>
                    </ul>
                </div>
                <div class="space-y-2">
                    <h2 class="text-base font-semibold text-[#0f1b2b]">Ready to book?</h2>
                    <p class="text-[#234567]">Pick a time that works. We’ll confirm your booking instantly and meet you at the scheduled time.</p>
                </div>
            </div>
            <div>
                <a href="{{ route('calendly.redirect') }}" class="inline-flex items-center justify-center px-6 py-3 rounded-xl bg-[#1f65d1] text-white font-semibold shadow hover:bg-[#164d9c] transition">
                    Book a call
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
