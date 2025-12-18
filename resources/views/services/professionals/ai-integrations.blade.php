@extends('layouts.marketing')

@section('title', 'AI Integrations for Professionals | HappyTek — Easily Solved.')

@section('content')
<div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-16 space-y-10">
    <a href="{{ url('/#services') }}" class="text-sm font-semibold text-[#1f65d1] hover:underline">← Back to services</a>
    <div class="card-surface p-8 lg:p-10 space-y-6 border-[#dbe7f8] shadow-md">
        <div class="space-y-3">
            <span class="pill">Professionals</span>
            <h1 class="text-3xl sm:text-4xl font-semibold text-[#0f1b2b]">AI integrations — smart help that stays in bounds.</h1>
            <p class="text-lg text-[#2b3f54]">Add AI where it saves time: summaries, drafts, and searchable notes. We pick simple, secure tools that respect your clients and workflow.</p>
        </div>
        <div class="flex flex-col sm:flex-row gap-4">
            <a href="/contact" class="btn-primary">Add AI safely</a>
            <a href="/pricing" class="btn-secondary">Review pricing</a>
        </div>
    </div>

    <div class="grid lg:grid-cols-2 gap-6">
        <div class="muted-card p-6 space-y-3">
            <h2 class="text-xl font-semibold text-[#0f1b2b]">Who it’s for</h2>
            <ul class="space-y-3 text-sm text-[#2b3f54]">
                <li class="flex gap-3"><span class="accent-badge mt-1"></span><span>Professionals who want faster summaries and drafts without risking client data.</span></li>
                <li class="flex gap-3"><span class="accent-badge mt-1"></span><span>Solo practices needing quick research or template creation inside existing tools.</span></li>
                <li class="flex gap-3"><span class="accent-badge mt-1"></span><span>Anyone curious about AI but wanting boundaries and documentation first.</span></li>
            </ul>
        </div>
        <div class="muted-card p-6 space-y-3">
            <h2 class="text-xl font-semibold text-[#0f1b2b]">What’s included</h2>
            <ul class="space-y-3 text-sm text-[#2b3f54]">
                <li class="flex gap-3"><span class="accent-badge mt-1"></span><span>Use cases mapped to your work: summaries, drafts, knowledge lookups, or intake.</span></li>
                <li class="flex gap-3"><span class="accent-badge mt-1"></span><span>Setup inside your current apps with permissions, policies, and clear guardrails.</span></li>
                <li class="flex gap-3"><span class="accent-badge mt-1"></span><span>Quick training and scripts you can reuse with clients and assistants.</span></li>
            </ul>
        </div>
    </div>

    <div class="card-surface p-8 space-y-4 border-[#e1f0d7] shadow-md">
        <h2 class="text-xl font-semibold text-[#0f1b2b]">What it solves</h2>
        <p class="text-[#2b3f54]">You get the speed of AI without new risk. Every prompt and policy is written down so you can keep delivering confidently.</p>
        <div class="flex flex-col sm:flex-row gap-3">
            <a href="/contact" class="btn-primary">Plan my AI step</a>
            <a href="/pricing" class="btn-secondary">See options</a>
        </div>
    </div>
</div>
@endsection
