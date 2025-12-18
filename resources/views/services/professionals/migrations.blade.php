@extends('layouts.marketing')

@section('title', 'Migrations | HappyTek — Easily Solved.')

@section('content')
<div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-16 space-y-10">
    <a href="{{ url('/#services') }}" class="text-sm font-semibold text-[#1f65d1] hover:underline">← Back to services</a>
    <div class="card-surface p-8 lg:p-10 space-y-6 border-[#dbe7f8] shadow-md">
        <div class="space-y-3">
            <span class="pill">Professionals</span>
            <h1 class="text-3xl sm:text-4xl font-semibold text-[#0f1b2b]">Migrations — move tools without missing a beat.</h1>
            <p class="text-lg text-[#2b3f54]">Shift email, files, and calendars to better platforms with zero chaos. We plan the move, execute it, and document where everything lives.</p>
        </div>
        <div class="flex flex-col sm:flex-row gap-4">
            <a href="/contact" class="btn-primary">Plan my migration</a>
            <a href="/pricing" class="btn-secondary">Discuss scope</a>
        </div>
    </div>

    <div class="grid lg:grid-cols-2 gap-6">
        <div class="muted-card p-6 space-y-3">
            <h2 class="text-xl font-semibold text-[#0f1b2b]">Who it’s for</h2>
            <ul class="space-y-3 text-sm text-[#2b3f54]">
                <li class="flex gap-3"><span class="accent-badge mt-1"></span><span>Founders leaving a personal email for a branded account.</span></li>
                <li class="flex gap-3"><span class="accent-badge mt-1"></span><span>Realtors, lawyers, or accountants moving files to better cloud storage.</span></li>
                <li class="flex gap-3"><span class="accent-badge mt-1"></span><span>Anyone merging accounts after a rebrand or role change.</span></li>
            </ul>
        </div>
        <div class="muted-card p-6 space-y-3">
            <h2 class="text-xl font-semibold text-[#0f1b2b]">What’s included</h2>
            <ul class="space-y-3 text-sm text-[#2b3f54]">
                <li class="flex gap-3"><span class="accent-badge mt-1"></span><span>Preflight plan covering mail flow, contacts, calendars, and drive structure.</span></li>
                <li class="flex gap-3"><span class="accent-badge mt-1"></span><span>Migration execution with live checkpoints so you know what’s moving when.</span></li>
                <li class="flex gap-3"><span class="accent-badge mt-1"></span><span>Final validation plus simple instructions for you and any assistants.</span></li>
            </ul>
        </div>
    </div>

    <div class="card-surface p-8 space-y-4 border-[#e1f0d7] shadow-md">
        <h2 class="text-xl font-semibold text-[#0f1b2b]">What it solves</h2>
        <p class="text-[#2b3f54]">No missing files, no double calendars, and no mystery inboxes. Your tech stays organized while you keep serving clients.</p>
        <div class="flex flex-col sm:flex-row gap-3">
            <a href="/contact" class="btn-primary">Schedule a migration</a>
            <a href="/pricing" class="btn-secondary">Review options</a>
        </div>
    </div>
</div>
@endsection
