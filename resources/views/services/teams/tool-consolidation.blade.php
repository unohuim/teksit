@extends('layouts.marketing')

@section('title', 'Tool Consolidation | HappyTek — Easily Solved.')

@section('content')
<div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-16 space-y-10">
    <a href="{{ url('/#services') }}" class="text-sm font-semibold text-[#1f65d1] hover:underline">← Back to services</a>
    <div class="card-surface p-8 lg:p-10 space-y-6 border-[#dbe7f8] shadow-md">
        <div class="space-y-3">
            <span class="pill">Small Teams</span>
            <h1 class="text-3xl sm:text-4xl font-semibold text-[#0f1b2b]">Tool consolidation — fewer apps, clearer workflows.</h1>
            <p class="text-lg text-[#2b3f54]">We evaluate what you use, remove duplicates, and set a lean stack that everyone understands. Less switching, lower costs, and clear ownership.</p>
        </div>
        <div class="flex flex-col sm:flex-row gap-4">
            <a href="/contact" class="btn-primary">Simplify my tools</a>
            <a href="/pricing" class="btn-secondary">Review pricing</a>
        </div>
    </div>

    <div class="grid lg:grid-cols-2 gap-6">
        <div class="muted-card p-6 space-y-3">
            <h2 class="text-xl font-semibold text-[#0f1b2b]">Who it’s for</h2>
            <ul class="space-y-3 text-sm text-[#2b3f54]">
                <li class="flex gap-3"><span class="accent-badge mt-1"></span><span>Teams spending too much on overlapping apps.</span></li>
                <li class="flex gap-3"><span class="accent-badge mt-1"></span><span>Leaders wanting one place for tasks, files, and communication.</span></li>
                <li class="flex gap-3"><span class="accent-badge mt-1"></span><span>Groups inheriting messy toolsets after fast growth or contractor turnover.</span></li>
            </ul>
        </div>
        <div class="muted-card p-6 space-y-3">
            <h2 class="text-xl font-semibold text-[#0f1b2b]">What’s included</h2>
            <ul class="space-y-3 text-sm text-[#2b3f54]">
                <li class="flex gap-3"><span class="accent-badge mt-1"></span><span>Audit of current apps, costs, logins, and ownership.</span></li>
                <li class="flex gap-3"><span class="accent-badge mt-1"></span><span>Recommendations with a staged rollout so your team can adopt smoothly.</span></li>
                <li class="flex gap-3"><span class="accent-badge mt-1"></span><span>Cleanup, permission updates, and playbooks that keep things lean.</span></li>
            </ul>
        </div>
    </div>

    <div class="card-surface p-8 space-y-4 border-[#e1f0d7] shadow-md">
        <h2 class="text-xl font-semibold text-[#0f1b2b]">What it solves</h2>
        <p class="text-[#2b3f54]">Your team knows exactly which tools to use and why. Billing shrinks, context switching drops, and everyone stays aligned.</p>
        <div class="flex flex-col sm:flex-row gap-3">
            <a href="/contact" class="btn-primary">Start consolidating</a>
            <a href="/pricing" class="btn-secondary">See options</a>
        </div>
    </div>
</div>
@endsection
