@extends('layouts.marketing')

@section('title', 'Contact HappyTek — Start a request')

@section('content')
<link href="https://assets.calendly.com/assets/external/widget.css" rel="stylesheet">
<script src="https://assets.calendly.com/assets/external/widget.js" async></script>

<section class="bg-white/70 backdrop-blur-sm py-16 sm:py-20" x-data="contactFlow()" x-init="initListeners()">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 space-y-10">
        <div class="text-center space-y-4 max-w-3xl mx-auto">
            <span class="pill">Contact</span>
            <h1 class="text-3xl sm:text-4xl font-semibold text-[#0f1b2b]">Tell us what you need support with</h1>
            <p class="text-lg text-[#2b3f54]">We’ll capture your details, then you can choose between Fix It Now or Plan It Properly.</p>
        </div>

        <template x-if="error">
            <div class="max-w-3xl mx-auto p-4 rounded-lg bg-red-50 border border-red-200 text-red-800" x-text="error"></div>
        </template>

        <div class="grid gap-8 lg:grid-cols-3 lg:items-start">
            <div class="lg:col-span-2 muted-card shadow-md p-6 lg:p-8 space-y-6">
                <template x-if="step === 'request'">
                    <div class="space-y-6">
                        <div class="space-y-2">
                            <p class="text-sm font-semibold text-[#1f65d1]">Step 1 of 2</p>
                            <h2 class="text-2xl font-semibold text-[#0f1b2b]">Request context</h2>
                            <p class="text-[#2b3f54]">We’ll keep this on file as a draft even if you don’t finish scheduling.</p>
                        </div>
                        <form class="space-y-5" @submit.prevent="submitStepOne">
                            <div class="grid sm:grid-cols-2 gap-4">
                                <div class="space-y-2">
                                    <label for="name" class="block text-sm font-medium text-[#0f1b2b]">Name</label>
                                    <input id="name" type="text" x-model="form.name" class="w-full rounded-lg border border-[#cfe0c5] bg-white px-4 py-2 text-[#0f1b2b] focus:border-[#1f65d1] focus:ring-[#1f65d1]" required />
                                </div>
                                <div class="space-y-2">
                                    <label for="email" class="block text-sm font-medium text-[#0f1b2b]">Email</label>
                                    <input id="email" type="email" x-model="form.email" class="w-full rounded-lg border border-[#cfe0c5] bg-white px-4 py-2 text-[#0f1b2b] focus:border-[#1f65d1] focus:ring-[#1f65d1]" required />
                                </div>
                            </div>

                            <div class="space-y-2">
                                <label for="phone" class="block text-sm font-medium text-[#0f1b2b]">Phone (optional)</label>
                                <input id="phone" type="text" x-model="form.phone" class="w-full rounded-lg border border-[#cfe0c5] bg-white px-4 py-2 text-[#0f1b2b] focus:border-[#1f65d1] focus:ring-[#1f65d1]" placeholder="If you’d rather talk" />
                            </div>

                            <div class="space-y-3">
                                <p class="block text-sm font-medium text-[#0f1b2b]">Who is this for?</p>
                                <div class="grid sm:grid-cols-3 gap-3">
                                    <template x-for="audience in audiences" :key="audience">
                                        <label class="flex items-start gap-3 rounded-xl border border-[#cfe0c5] bg-white px-4 py-3 cursor-pointer hover:border-[#1f65d1]" :class="form.audience_type === audience ? 'ring-2 ring-[#1f65d1]' : ''">
                                            <input type="radio" :value="audience" x-model="form.audience_type" class="mt-1" />
                                            <span>
                                                <span class="font-semibold text-[#0f1b2b]" x-text="audience"></span>
                                            </span>
                                        </label>
                                    </template>
                                </div>
                            </div>

                            <div class="space-y-2">
                                <label for="service_name" class="block text-sm font-medium text-[#0f1b2b]">Service</label>
                                <select id="service_name" x-model="form.service_name" class="w-full rounded-lg border border-[#cfe0c5] bg-white px-4 py-2 text-[#0f1b2b] focus:border-[#1f65d1] focus:ring-[#1f65d1]" required>
                                    <option value="" disabled>Select a service</option>
                                    <template x-for="option in serviceOptions" :key="option">
                                        <option x-text="option"></option>
                                    </template>
                                </select>
                                <p class="text-xs text-[#2b3f54]">Options adapt to the audience you choose.</p>
                            </div>

                            <div class="space-y-2">
                                <label for="description" class="block text-sm font-medium text-[#0f1b2b]">Tell us what’s going on</label>
                                <textarea id="description" rows="4" x-model="form.description" class="w-full rounded-lg border border-[#cfe0c5] bg-white px-4 py-3 text-[#0f1b2b] focus:border-[#1f65d1] focus:ring-[#1f65d1]" placeholder="A few sentences is fine. If you’re not sure, just describe the situation." required></textarea>
                            </div>

                            <p class="text-sm text-[#2b3f54]">No scheduling, pricing, or urgency yet.</p>

                            <div class="pt-2 flex flex-col sm:flex-row sm:items-center gap-3">
                                <button type="submit" class="btn-primary w-full sm:w-auto" :disabled="loading">
                                    <span x-show="!loading">Request</span>
                                    <span x-show="loading">Saving...</span>
                                </button>
                                <p class="text-sm text-[#2b3f54]">We’ll save this as a draft so you can choose the right path next.</p>
                            </div>
                        </form>
                    </div>
                </template>

                <template x-if="step === 'choose'">
                    <div class="space-y-6">
                        <div class="space-y-2">
                            <p class="text-sm font-semibold text-[#1f65d1]">Step 2 of 2</p>
                            <h2 class="text-2xl font-semibold text-[#0f1b2b]">Choose your path</h2>
                            <p class="text-[#2b3f54]">Pick how you’d like us to help. Your draft request is saved.</p>
                        </div>
                        <div class="grid gap-4 md:grid-cols-2">
                            <div class="border border-[#cfe0c5] rounded-2xl bg-white p-5 space-y-3">
                                <div class="flex items-center gap-2 text-green-700 font-semibold">
                                    <span class="text-lg">🟢</span>
                                    <span>Fix It Now</span>
                                </div>
                                <p class="text-sm text-[#2b3f54]">Immediate help, flat pricing. Book a session without leaving happytek.ca.</p>
                                <p class="text-sm text-[#0f1b2b] font-semibold">Flat price: $129</p>
                                <button @click="selectPath('fix_now')" class="btn-primary w-full" :disabled="loading">Book a Fix It Now call</button>
                            </div>
                            <div class="border border-[#dbe6f6] rounded-2xl bg-white p-5 space-y-3">
                                <div class="flex items-center gap-2 text-blue-700 font-semibold">
                                    <span class="text-lg">🔵</span>
                                    <span>Plan It Properly</span>
                                </div>
                                <p class="text-sm text-[#2b3f54]">We’ll review your request, follow up with clarifying questions, and send a scoped plan with a quote.</p>
                                <button @click="selectPath('plan_properly')" class="w-full inline-flex justify-center px-4 py-2 rounded-lg border border-[#1f65d1] text-[#1f65d1] font-semibold hover:bg-[#e8f2ff]" :disabled="loading">Continue with Plan It Properly</button>
                            </div>
                        </div>
                    </div>
                </template>

                <template x-if="step === 'plan'">
                    <div class="space-y-4">
                        <h2 class="text-2xl font-semibold text-[#0f1b2b]">Request received</h2>
                        <p class="text-[#2b3f54]">We’ll review your request and follow up with a scoped plan. Check your email for confirmation.</p>
                        <div class="text-sm text-[#2b3f54] space-y-2">
                            <p class="font-semibold">Next steps:</p>
                            <ul class="list-disc list-inside space-y-1">
                                <li>We may follow up with clarifying questions.</li>
                                <li>You’ll receive a clear quote for approval.</li>
                                <li>No payment is required yet.</li>
                            </ul>
                        </div>
                    </div>
                </template>

                <template x-if="step === 'fix'">
                    <div class="space-y-6">
                        <div class="space-y-2">
                            <h2 class="text-2xl font-semibold text-[#0f1b2b]">Book your Fix It Now session</h2>
                            <p class="text-[#2b3f54]">Calendar stays on this page. We’ll pass your name, email, and request ID to Calendly so we can match your booking.</p>
                        </div>
                        <div id="calendly-inline" class="min-h-[680px] border border-[#cfe0c5] rounded-2xl overflow-hidden bg-white"></div>
                        <template x-if="confirmation">
                            <div class="bg-green-50 border border-green-200 rounded-xl p-4 space-y-1">
                                <p class="font-semibold text-green-800">You’re booked</p>
                                <p class="text-green-800" x-text="confirmation"></p>
                                <p class="text-sm text-green-700">A confirmation email is on the way.</p>
                            </div>
                        </template>
                    </div>
                </template>
            </div>

            <div class="card-surface shadow-sm p-6 space-y-5 lg:p-7 lg:space-y-6 lg:block hidden">
                <div class="space-y-2">
                    <h2 class="text-xl font-semibold text-[#0f1b2b]">What happens next</h2>
                    <p class="text-sm text-[#2b3f54]">Straightforward steps so you know what to expect.</p>
                </div>
                <ul class="space-y-3 text-sm text-[#2b3f54]">
                    <li class="flex gap-3">
                        <span class="accent-badge mt-1"></span>
                        <span>We save your request as a draft immediately.</span>
                    </li>
                    <li class="flex gap-3">
                        <span class="accent-badge mt-1"></span>
                        <span>Pick Fix It Now or Plan It Properly.</span>
                    </li>
                    <li class="flex gap-3">
                        <span class="accent-badge mt-1"></span>
                        <span>Calendly stays embedded for Fix It Now bookings.</span>
                    </li>
                </ul>
                <div class="muted-card p-4 text-sm text-[#2b3f54] space-y-1">
                    <p class="font-semibold text-[#0f1b2b]">Prefer email or phone?</p>
                    <p>hello@happytek.ca</p>
                    <p>1-800-HAPPYTEK</p>
                </div>
                <div class="bg-gradient-to-br from-[#1f65d1] to-[#0f2f76] text-slate-50 rounded-xl p-4 text-sm space-y-1 shadow-md">
                    <p class="font-semibold">HappyTek — Easily Solved.</p>
                    <p class="text-slate-100/90">We keep your tech predictable, friendly, and finished.</p>
                </div>
            </div>
        </div>

        <div class="card-surface shadow-sm p-6 space-y-3 lg:hidden">
            <div class="space-y-2">
                <h2 class="text-xl font-semibold text-[#0f1b2b]">What happens next</h2>
                <p class="text-sm text-[#2b3f54]">Simple steps so you know what to expect.</p>
            </div>
            <ul class="space-y-2 text-sm text-[#2b3f54]">
                <li class="flex gap-3">
                    <span class="accent-badge mt-1"></span>
                    <span>We save your request as a draft immediately.</span>
                </li>
                <li class="flex gap-3">
                    <span class="accent-badge mt-1"></span>
                    <span>Pick Fix It Now or Plan It Properly.</span>
                </li>
                <li class="flex gap-3">
                    <span class="accent-badge mt-1"></span>
                    <span>Calendly stays embedded for Fix It Now bookings.</span>
                </li>
            </ul>
        </div>
    </div>
</section>

<script>
    function contactFlow() {
        return {
            step: 'request',
            loading: false,
            error: null,
            confirmation: null,
            requestId: null,
            audiences: ['Individual', 'Professional', 'Small Team'],
            form: {
                name: '',
                email: '',
                phone: '',
                audience_type: 'Individual',
                service_name: '',
                description: '',
            },
            get serviceOptions() {
                const options = {
                    'Individual': ['Fix It Now Session', 'Setups', 'Wi-Fi & Network', 'Security & Passwords', 'Not sure — need guidance'],
                    'Professional': ['Fix It Now Session', 'Leads Mgmt & Bookings', 'Automations & Efficiency', 'AI Integrations', 'Brand Launch Support'],
                    'Small Team': ['Fix It Now Session', 'Onboarding Support', 'Shared Info & Collaboration', 'Tool Consolidation', 'Project Concierge'],
                };

                return options[this.form.audience_type] ?? ['Fix It Now Session'];
            },
            csrf() {
                return document.querySelector('meta[name=\'csrf-token\']')?.getAttribute('content');
            },
            async submitStepOne() {
                this.error = null;
                this.loading = true;

                try {
                    const response = await fetch('{{ route('requests.store') }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': this.csrf(),
                        },
                        body: JSON.stringify({
                            ...this.form,
                        }),
                    });

                    if (!response.ok) {
                        throw new Error('We could not save your request.');
                    }

                    const data = await response.json();
                    this.requestId = data.request.id;
                    this.step = 'choose';
                } catch (e) {
                    this.error = e.message || 'Something went wrong.';
                } finally {
                    this.loading = false;
                }
            },
            async selectPath(path) {
                if (!this.requestId) {
                    this.error = 'Save your request first.';
                    return;
                }

                this.error = null;
                this.loading = true;

                try {
                    const response = await fetch('{{ route('requests.choose-path') }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': this.csrf(),
                        },
                        body: JSON.stringify({
                            request_id: this.requestId,
                            path,
                        }),
                    });

                    if (!response.ok) {
                        throw new Error('Unable to continue.');
                    }

                    if (path === 'plan_properly') {
                        this.step = 'plan';
                    } else {
                        this.step = 'fix';
                        this.initCalendly();
                    }
                } catch (e) {
                    this.error = e.message || 'Something went wrong.';
                } finally {
                    this.loading = false;
                }
            },
            initCalendly() {
                const url = '{{ config('services.calendly.event_type_url') }}';

                if (!url) {
                    this.error = 'Calendly is not configured yet.';
                    return;
                }

                const waitForCalendly = () => {
                    if (window.Calendly) {
                        Calendly.initInlineWidget({
                            url,
                            parentElement: document.getElementById('calendly-inline'),
                            prefill: {
                                name: this.form.name,
                                email: this.form.email,
                            },
                            utm: {
                                utm_medium: 'request',
                                utm_content: this.requestId ? String(this.requestId) : '',
                            },
                        });
                    } else {
                        setTimeout(waitForCalendly, 200);
                    }
                };

                waitForCalendly();
            },
            initListeners() {
                window.addEventListener('message', (event) => {
                    if (event.data?.event === 'calendly.event_scheduled') {
                        const when = event.data?.payload?.event?.start_time;
                        this.confirmation = when ? `Scheduled for ${new Date(when).toLocaleString()}` : 'We received your booking.';
                    }
                });
            },
        };
    }
</script>
@endsection
