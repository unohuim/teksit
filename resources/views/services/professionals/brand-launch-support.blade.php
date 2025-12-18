@extends('layouts.marketing')

@section('title', 'Brand Launch Support | HappyTek — Easily Solved.')

@section('content')
<div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-16 space-y-10">
    <a href="{{ url('/#services') }}" class="text-sm font-semibold text-[#1f65d1] hover:underline">← Back to services</a>
    <div class="card-surface p-8 lg:p-10 space-y-6 border-[#dbe7f8] shadow-md">
        <div class="space-y-3">
            <span class="pill">Professionals</span>
            <h1 class="text-3xl sm:text-4xl font-semibold text-[#0f1b2b]">Brand launch support — show up polished from day one.</h1>
            <p class="text-lg text-[#2b3f54]">Founders, realtors, mortgage agents, lawyers, and accountants get a ready-to-run presence: domain, email, booking links, and a clean page that looks legit.</p>
        </div>
        <div class="flex flex-col sm:flex-row gap-4">
            <a href="/contact" class="btn-primary">Start my launch</a>
            <a href="/pricing" class="btn-secondary">See launch pricing</a>
        </div>
    </div>

    <div class="grid lg:grid-cols-2 gap-6">
        <div class="muted-card p-6 space-y-3">
            <h2 class="text-xl font-semibold text-[#0f1b2b]">Who it’s for</h2>
            <ul class="space-y-3 text-sm text-[#2b3f54]">
                <li class="flex gap-3"><span class="accent-badge mt-1"></span><span>Solo pros who need a professional front door fast.</span></li>
                <li class="flex gap-3"><span class="accent-badge mt-1"></span><span>Founders who want a consistent way to book calls and collect leads.</span></li>
                <li class="flex gap-3"><span class="accent-badge mt-1"></span><span>Anyone tired of DIY tools that don’t match or connect.</span></li>
            </ul>
        </div>
        <div class="muted-card p-6 space-y-3">
            <h2 class="text-xl font-semibold text-[#0f1b2b]">What’s included</h2>
            <ul class="space-y-3 text-sm text-[#2b3f54]">
                <li class="flex gap-3"><span class="accent-badge mt-1"></span><span>Domain purchase or cleanup, DNS, and branded email that works on every device.</span></li>
                <li class="flex gap-3"><span class="accent-badge mt-1"></span><span>Booking links, intake forms, and calendar routing so meetings stay organized.</span></li>
                <li class="flex gap-3"><span class="accent-badge mt-1"></span><span>A one-page site or profile with your services, testimonials, and clear CTAs.</span></li>
            </ul>
        </div>
    </div>

    <div class="card-surface p-8 space-y-4 border-[#e1f0d7] shadow-md">
        <h2 class="text-xl font-semibold text-[#0f1b2b]">What it solves</h2>
        <p class="text-[#2b3f54]">Clients see a consistent brand, can book instantly, and receive confirmations without you juggling tools. You focus on the work, not the tech glue.</p>
        <div class="flex flex-col sm:flex-row gap-3">
            <a href="/contact" class="btn-primary">Book your launch</a>
            <a href="/pricing" class="btn-secondary">Review options</a>
        </div>
    </div>
</div>
@endsection
