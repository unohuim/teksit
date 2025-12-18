@extends('layouts.marketing')

@section('title', 'Cloud Migrations for Teams | HappyTek — Easily Solved.')

@section('content')
<div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-16 space-y-10">
    <a href="{{ url('/#services') }}" class="text-sm font-semibold text-[#1f65d1] hover:underline">← Back to services</a>
    <div class="card-surface p-8 lg:p-10 space-y-6 border-[#dbe7f8] shadow-md">
        <div class="space-y-3">
            <span class="pill">Small Teams</span>
            <h1 class="text-3xl sm:text-4xl font-semibold text-[#0f1b2b]">Cloud migrations — organized files, no downtime.</h1>
            <p class="text-lg text-[#2b3f54]">Move shared drives, email, and calendars to a better setup without losing history. We map the folders, permissions, and routes so everyone stays in sync.</p>
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
                <li class="flex gap-3"><span class="accent-badge mt-1"></span><span>Teams outgrowing personal drives or mixing multiple storage tools.</span></li>
                <li class="flex gap-3"><span class="accent-badge mt-1"></span><span>Leaders who want predictable access control and clean folder structure.</span></li>
                <li class="flex gap-3"><span class="accent-badge mt-1"></span><span>Groups consolidating after a rebrand or a new office setup.</span></li>
            </ul>
        </div>
        <div class="muted-card p-6 space-y-3">
            <h2 class="text-xl font-semibold text-[#0f1b2b]">What’s included</h2>
            <ul class="space-y-3 text-sm text-[#2b3f54]">
                <li class="flex gap-3"><span class="accent-badge mt-1"></span><span>Current-state audit of drives, permissions, and naming.</span></li>
                <li class="flex gap-3"><span class="accent-badge mt-1"></span><span>Migration plan with timing, validation steps, and clear owner approvals.</span></li>
                <li class="flex gap-3"><span class="accent-badge mt-1"></span><span>Execution plus final walkthrough so everyone knows where to work.</span></li>
            </ul>
        </div>
    </div>

    <div class="card-surface p-8 space-y-4 border-[#e1f0d7] shadow-md">
        <h2 class="text-xl font-semibold text-[#0f1b2b]">What it solves</h2>
        <p class="text-[#2b3f54]">Folders and mail move cleanly, permissions are right, and your team keeps working while we handle the shift.</p>
        <div class="flex flex-col sm:flex-row gap-3">
            <a href="/contact" class="btn-primary">Schedule migration help</a>
            <a href="/pricing" class="btn-secondary">Review options</a>
        </div>
    </div>
</div>
@endsection
