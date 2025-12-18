@extends('layouts.marketing')

@section('title', 'Request confirmed — HappyTek')

@section('content')
<section class="bg-white/70 backdrop-blur-sm py-16 sm:py-24">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white border border-[#d9e8d2] rounded-2xl shadow-sm p-8 sm:p-12 space-y-6 text-center">
            <span class="pill">You’re all set</span>
            <h1 class="text-3xl sm:text-4xl font-semibold text-[#0f1b2b]">Discovery confirmed</h1>
            <p class="text-lg text-[#2b3f54]">We’ve booked your discovery call and recorded your $129 discovery deposit.</p>

            <div class="grid gap-6 sm:grid-cols-3 text-left">
                <div class="muted-card p-4 rounded-xl border border-[#e6f0e2] bg-[#f9fcf6]">
                    <p class="text-xs font-semibold uppercase text-[#1f65d1]">Discovery call</p>
                    <p class="text-sm text-[#0f1b2b] mt-1">{{ optional($requestModel->scheduled_at)->format('l, F j, g:i a') ?? 'Scheduled' }}</p>
                    <p class="text-xs text-[#2b3f54]">We’ll meet you at the booked time.</p>
                </div>
                <div class="muted-card p-4 rounded-xl border border-[#e6f0e2] bg-[#f9fcf6]">
                    <p class="text-xs font-semibold uppercase text-[#1f65d1]">Deposit</p>
                    <p class="text-sm text-[#0f1b2b] mt-1">$129 secured</p>
                    <p class="text-xs text-[#2b3f54]">Applied to service or credited toward your project.</p>
                </div>
                <div class="muted-card p-4 rounded-xl border border-[#e6f0e2] bg-[#f9fcf6]">
                    <p class="text-xs font-semibold uppercase text-[#1f65d1]">Status</p>
                    <p class="text-sm text-[#0f1b2b] mt-1 capitalize">{{ $requestModel->status }}</p>
                    <p class="text-xs text-[#2b3f54]">We’ll move to completed after your session.</p>
                </div>
            </div>

            <div class="text-left space-y-3 max-w-2xl mx-auto">
                <h2 class="text-xl font-semibold text-[#0f1b2b]">What happens next</h2>
                <ul class="list-disc list-inside text-[#2b3f54] space-y-2 text-sm">
                    <li>You’ll receive Calendly confirmations and reminders for your booked time.</li>
                    <li>Your deposit is recorded against request #{{ $requestModel->id }}.</li>
                    <li>If we solve everything on the call, the $129 stands as the service fee. If we scope a project, it’s credited toward your quote.</li>
                </ul>
                <p class="text-sm text-[#2b3f54]">Need anything before the call? Email <a href="mailto:hello@happytek.ca" class="text-[#1f65d1] font-semibold">hello@happytek.ca</a>.</p>
            </div>
        </div>
    </div>
</section>
@endsection
