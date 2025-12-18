@extends('layouts.marketing')

@section('title', 'Shared Info & Collaboration | HappyTek — Easily Solved.')

@section('content')
<div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-16 space-y-10">
    <a href="{{ url('/#services') }}" class="text-sm font-semibold text-[#1f65d1] hover:underline">← Back to services</a>
    <div class="card-surface p-8 lg:p-10 space-y-6 border-[#dbe7f8] shadow-md">
        <div class="space-y-3">
            <span class="pill">Small Teams</span>
            <h1 class="text-3xl sm:text-4xl font-semibold text-[#0f1b2b]">Shared info & collaboration — everything your team needs, findable.</h1>
            <p class="text-lg text-[#2b3f54]">We tidy calendars, shared inboxes, chat channels, and folders so everyone knows where information lives. Less hunting, more delivery.</p>
        </div>
        <div class="flex flex-col sm:flex-row gap-4">
            <a href="/contact" class="btn-primary">Organize my team</a>
            <a href="/pricing" class="btn-secondary">Review pricing</a>
        </div>
    </div>

    <div class="grid lg:grid-cols-2 gap-6">
        <div class="muted-card p-6 space-y-3">
            <h2 class="text-xl font-semibold text-[#0f1b2b]">Who it’s for</h2>
            <ul class="space-y-3 text-sm text-[#2b3f54]">
                <li class="flex gap-3"><span class="accent-badge mt-1"></span><span>Teams under ten who want a single source of truth without big software.</span></li>
                <li class="flex gap-3"><span class="accent-badge mt-1"></span><span>Leaders tired of scattered documents and unmanaged shared inboxes.</span></li>
                <li class="flex gap-3"><span class="accent-badge mt-1"></span><span>Groups needing predictable calendar sharing and access boundaries.</span></li>
            </ul>
        </div>
        <div class="muted-card p-6 space-y-3">
            <h2 class="text-xl font-semibold text-[#0f1b2b]">What’s included</h2>
            <ul class="space-y-3 text-sm text-[#2b3f54]">
                <li class="flex gap-3"><span class="accent-badge mt-1"></span><span>Shared inbox rules, templates, and routing so client replies stay quick.</span></li>
                <li class="flex gap-3"><span class="accent-badge mt-1"></span><span>Calendar sharing, roles, and availability settings that keep schedules clear.</span></li>
                <li class="flex gap-3"><span class="accent-badge mt-1"></span><span>Folder and channel structure with naming conventions and owners.</span></li>
            </ul>
        </div>
    </div>

    <div class="card-surface p-8 space-y-4 border-[#e1f0d7] shadow-md">
        <h2 class="text-xl font-semibold text-[#0f1b2b]">What it solves</h2>
        <p class="text-[#2b3f54]">Your team knows exactly where to collaborate and what to share. Information stops getting lost, and clients notice the quick replies.</p>
        <div class="flex flex-col sm:flex-row gap-3">
            <a href="/contact" class="btn-primary">Start organizing</a>
            <a href="/pricing" class="btn-secondary">See options</a>
        </div>
    </div>
</div>
@endsection
