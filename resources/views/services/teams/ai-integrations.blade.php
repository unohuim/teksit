@extends('layouts.marketing')

@section('title', 'AI Integrations for Teams | HappyTek — Easily Solved.')

@section('content')
<div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-16 space-y-10">
    <a href="{{ url('/#services') }}" class="text-sm font-semibold text-[#1f65d1] hover:underline">← Back to services</a>
    <div class="card-surface p-8 lg:p-10 space-y-6 border-[#dbe7f8] shadow-md">
        <div class="space-y-3">
            <span class="pill">Small Teams</span>
            <h1 class="text-3xl sm:text-4xl font-semibold text-[#0f1b2b]">AI integrations — helpful copilots tuned to your team.</h1>
            <p class="text-lg text-[#2b3f54]">We add AI where it saves time: meeting recaps, searchable knowledge, and quick drafts. Everything stays permissioned and explained.</p>
        </div>
        <div class="flex flex-col sm:flex-row gap-4">
            <a href="/contact" class="btn-primary">Add AI the right way</a>
            <a href="/pricing" class="btn-secondary">Review pricing</a>
        </div>
    </div>

    <div class="grid lg:grid-cols-2 gap-6">
        <div class="muted-card p-6 space-y-3">
            <h2 class="text-xl font-semibold text-[#0f1b2b]">Who it’s for</h2>
            <ul class="space-y-3 text-sm text-[#2b3f54]">
                <li class="flex gap-3"><span class="accent-badge mt-1"></span><span>Teams under ten who want faster documentation and fewer meeting minutes.</span></li>
                <li class="flex gap-3"><span class="accent-badge mt-1"></span><span>Leaders needing AI guardrails and privacy set up before rollout.</span></li>
                <li class="flex gap-3"><span class="accent-badge mt-1"></span><span>Groups curious about AI but lacking time to test tools safely.</span></li>
            </ul>
        </div>
        <div class="muted-card p-6 space-y-3">
            <h2 class="text-xl font-semibold text-[#0f1b2b]">What’s included</h2>
            <ul class="space-y-3 text-sm text-[#2b3f54]">
                <li class="flex gap-3"><span class="accent-badge mt-1"></span><span>Use cases prioritized for your team: summaries, drafts, search, or support replies.</span></li>
                <li class="flex gap-3"><span class="accent-badge mt-1"></span><span>Setup inside your current tools with permissions, retention, and audit notes.</span></li>
                <li class="flex gap-3"><span class="accent-badge mt-1"></span><span>Training for the team plus a short guide with approved prompts.</span></li>
            </ul>
        </div>
    </div>

    <div class="card-surface p-8 space-y-4 border-[#e1f0d7] shadow-md">
        <h2 class="text-xl font-semibold text-[#0f1b2b]">What it solves</h2>
        <p class="text-[#2b3f54]">AI speeds up the right tasks without adding risk. Your team knows when to use it, what to avoid, and how to keep data safe.</p>
        <div class="flex flex-col sm:flex-row gap-3">
            <a href="/contact" class="btn-primary">Plan AI rollout</a>
            <a href="/pricing" class="btn-secondary">See options</a>
        </div>
    </div>
</div>
@endsection
