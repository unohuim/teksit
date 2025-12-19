@extends('layouts.marketing')

@section('title', 'Discovery request — HappyTek')

@section('content')
<link href="https://assets.calendly.com/assets/external/widget.css" rel="stylesheet">

<section id="request-start" class="bg-white/70 backdrop-blur-sm py-14 sm:py-18" x-data="requestFlow()" x-init="init()">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 space-y-10">
        <div class="text-center space-y-4 max-w-3xl mx-auto">
            <span class="pill">Discovery</span>
            <h1 class="text-3xl sm:text-4xl font-semibold text-[#0f1b2b]">Start with a discovery call</h1>
            <p class="text-lg text-[#2b3f54]">A focused, three-step flow: share context, lock a time, secure your $129 discovery deposit.</p>
        </div>

        <div class="bg-white border border-[#d9e8d2] rounded-2xl p-4 sm:p-6 shadow-sm">
            <div class="flex items-center gap-4">
                <div class="flex-1">
                    <div class="flex justify-between text-[11px] sm:text-xs font-semibold text-[#1f65d1]">
                        <span>Step 1 · Start request</span>
                        <span>Step 2 · Schedule</span>
                        <span>Step 3 · Billing</span>
                    </div>
                    <div class="mt-2 h-2 bg-[#e8f2ff] rounded-full overflow-hidden">
                        <div class="h-full bg-[#1f65d1] transition-all duration-300" :style="`width: ${progressPercent}%`"></div>
                    </div>
                </div>
                <a href="#request-start" class="text-xs font-semibold text-[#1f65d1] hover:text-[#0f2f76]">Fix Now</a>
            </div>
        </div>

        <template x-if="error">
            <div class="max-w-3xl mx-auto p-4 rounded-lg bg-red-50 border border-red-200 text-red-800" x-text="error"></div>
        </template>

        <div class="grid gap-8 lg:grid-cols-3 lg:items-start">
            <div class="lg:col-span-2 space-y-8">
                <div class="muted-card shadow-md p-6 lg:p-8 space-y-6" x-show="step === 'contact'" x-cloak>
                    <div class="space-y-2">
                        <p class="text-sm font-semibold text-[#1f65d1]">Step 1 of 3</p>
                        <h2 class="text-2xl font-semibold text-[#0f1b2b]">Start your request</h2>
                        <p class="text-[#2b3f54]">We’ll create your request immediately so we can prefill Calendly and keep everything on happytek.ca.</p>
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
                            <input id="phone" type="text" x-model="form.phone" class="w-full rounded-lg border border-[#cfe0c5] bg-white px-4 py-2 text-[#0f1b2b] focus:border-[#1f65d1] focus:ring-[#1f65d1]" placeholder="If you’d prefer a call back" />
                        </div>

                        <div class="space-y-3">
                            <p class="block text-sm font-medium text-[#0f1b2b]">Audience</p>
                            <div class="inline-flex rounded-xl bg-white border border-[#cfe0c5] p-1 shadow-sm w-full sm:w-auto">
                                <template x-for="audience in audiences" :key="audience.value">
                                    <button type="button"
                                        class="px-4 py-2 text-sm font-semibold rounded-lg focus:outline-none"
                                        :class="form.audience_type === audience.value ? 'bg-[#1f65d1] text-white shadow-sm' : 'text-[#0f1b2b]'"
                                        @click="form.audience_type = audience.value">
                                        <span x-text="audience.label"></span>
                                    </button>
                                </template>
                            </div>
                        </div>

                        <div class="space-y-2">
                            <label for="service_category" class="block text-sm font-medium text-[#0f1b2b]">Service category</label>
                            <select id="service_category" x-model="form.service_category" class="w-full rounded-lg border border-[#cfe0c5] bg-white px-4 py-2 text-[#0f1b2b] focus:border-[#1f65d1] focus:ring-[#1f65d1]" required>
                                <option value="" disabled>Select a category</option>
                                <template x-for="option in serviceOptions" :key="option">
                                    <option x-text="option"></option>
                                </template>
                            </select>
                            <p class="text-xs text-[#2b3f54]">Pick the closest fit — we’ll refine during the call.</p>
                        </div>

                        <div class="space-y-2">
                            <label for="description" class="block text-sm font-medium text-[#0f1b2b]">Description</label>
                            <textarea id="description" rows="4" x-model="form.description" class="w-full rounded-lg border border-[#cfe0c5] bg-white px-4 py-3 text-[#0f1b2b] focus:border-[#1f65d1] focus:ring-[#1f65d1]" placeholder="A few sentences about what you need." required></textarea>
                        </div>

                        <p class="text-sm text-[#2b3f54]">No pricing yet. We’ll only use your email to coordinate the call and follow up.</p>

                        <div class="pt-2 flex flex-col sm:flex-row sm:items-center gap-3">
                            <button type="submit" class="btn-primary w-full sm:w-auto" :disabled="loading">
                                <span x-show="!loading">Schedule discovery call</span>
                                <span x-show="loading">Saving...</span>
                            </button>
                            <p class="text-sm text-[#2b3f54]">We save instantly so we can prefill Calendly and save as started.</p>
                        </div>
                    </form>
                </div>

                <template x-if="step === 'book'">
                    <div class="muted-card shadow-md p-6 lg:p-8 space-y-6">
                        <div class="space-y-2">
                            <p class="text-sm font-semibold text-[#1f65d1]">Step 2 of 3</p>
                            <h2 class="text-2xl font-semibold text-[#0f1b2b]">Schedule discovery call</h2>
                            <p class="text-[#2b3f54]">Inline Calendly embed. One event only. We pass your request ID quietly.</p>
                        </div>
                        <div class="space-y-3">
                            <div class="flex items-center justify-between flex-wrap gap-3">
                                <div>
                                    <p class="text-sm font-semibold text-[#0f1b2b]">Discovery call</p>
                                    <p class="text-sm text-[#2b3f54]">Stay on this page. We prefill your name, email, and request ID.</p>
                                </div>
                                <div class="text-xs px-3 py-1 rounded-full bg-[#e8f2ff] text-[#1f65d1] font-semibold">No pricing shown</div>
                            </div>
                            <template x-if="request">
                                <div class="space-y-6">
                                    <div
                                        class="calendly-inline-widget border border-[#cfe0c5] rounded-2xl overflow-hidden bg-white"
                                        x-ref="calendlyWidget"
                                        style="min-width:320px;height:700px;">
                                    </div>

                                    <script
                                        src="https://assets.calendly.com/assets/external/widget.js"
                                        async>
                                    </script>
                                </div>
                            </template>
                        </div>
                        <template x-if="scheduledCopy">
                            <div class="bg-green-50 border border-green-200 rounded-xl p-4 space-y-1">
                                <p class="font-semibold text-green-800">Locked in</p>
                                <p class="text-green-800" x-text="scheduledCopy"></p>
                            </div>
                        </template>
                    </div>
                </template>

                <div id="billing-root" class="muted-card shadow-md p-6 lg:p-8 space-y-6" x-show="step === 'billing'" x-cloak>
                    <div class="space-y-2">
                        <p class="text-sm font-semibold text-[#1f65d1]">Step 3 of 3</p>
                        <h2 class="text-2xl font-semibold text-[#0f1b2b]">Discovery deposit</h2>
                        <p class="text-[#2b3f54]">Secure your spot with the $129 discovery deposit. The call itself is free.</p>
                    </div>
                    <div class="bg-white border border-[#dbe6f6] rounded-xl p-4 space-y-2">
                        <p class="font-semibold text-[#0f1b2b]">How the deposit works</p>
                        <ul class="list-disc list-inside text-sm text-[#2b3f54] space-y-1">
                            <li>If the issue is solved on the call, the $129 is the service fee.</li>
                            <li>If we scope a larger project, the $129 is credited toward the quote.</li>
                            <li>If the project is rejected, the $129 remains the discovery fee.</li>
                        </ul>
                    </div>
                    <div class="flex flex-col sm:flex-row sm:items-center gap-4">
                        <button @click="submitDeposit" class="btn-primary w-full sm:w-auto" :disabled="billing" x-text="billing ? 'Processing...' : 'Pay $129 deposit'"></button>
                        <p class="text-sm text-[#2b3f54]">Your request is marked paid immediately after a successful charge.</p>
                    </div>
                </div>
            </div>

            <div class="card-surface shadow-sm p-6 space-y-5 lg:p-7 lg:space-y-6">
                <div class="space-y-2">
                    <h2 class="text-xl font-semibold text-[#0f1b2b]">What to expect</h2>
                    <p class="text-sm text-[#2b3f54]">Intentional, linear steps — no new tabs.</p>
                </div>
                <ul class="space-y-3 text-sm text-[#2b3f54]">
                    <li class="flex gap-3">
                        <span class="accent-badge mt-1"></span>
                        <span>Status updates: started → scheduled → paid → completed.</span>
                    </li>
                    <li class="flex gap-3">
                        <span class="accent-badge mt-1"></span>
                        <span>Calendly is embedded inline with your request ID prefilled.</span>
                    </li>
                    <li class="flex gap-3">
                        <span class="accent-badge mt-1"></span>
                        <span>$129 discovery deposit is recorded against your request.</span>
                    </li>
                </ul>
                <div class="muted-card p-4 text-sm text-[#2b3f54] space-y-1">
                    <p class="font-semibold text-[#0f1b2b]">Need help?</p>
                    <p>hello@happytek.ca</p>
                    <p>1-800-HAPPYTEK</p>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    function requestFlow() {
        return {
            step: 'contact',
            loading: false,
            billing: false,
            error: null,
            request: null,
            scheduledCopy: null,
            billingMounted: false,
            calendlyBaseUrl: '{{ config('services.calendly.discovery_url') }}',
            calendlyDebug: @json(config('services.calendly.debug')),
            isProduction: @json(app()->environment('production')),
            audiences: [
                { value: 'individual', label: 'Individual' },
                { value: 'professional', label: 'Professional' },
                { value: 'small_team', label: 'Small Team' },
            ],
            form: {
                name: '',
                email: '',
                phone: '',
                audience_type: 'individual',
                service_category: '',
                description: '',
            },
            get serviceOptions() {
                const options = {
                    'individual': ['Discovery call', 'Setups', 'Wi-Fi & Network', 'Security & Passwords', 'Not sure — need guidance'],
                    'professional': ['Discovery call', 'Leads Mgmt & Bookings', 'Automations & Efficiency', 'AI Integrations', 'Brand Launch Support'],
                    'small_team': ['Discovery call', 'Onboarding Support', 'Shared Info & Collaboration', 'Tool Consolidation', 'Project Concierge'],
                };

                return options[this.form.audience_type] ?? ['Discovery call'];
            },
            get progressPercent() {
                if (this.step === 'contact') return 33;
                if (this.step === 'book') return 66;
                return 100;
            },
            csrf() {
                return document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');
            },
            async submitStepOne() {
                this.error = null;
                this.loading = true;

                try {
                    const response = await fetch('{{ route('requests.store') }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'Accept': 'application/json',
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
                    this.request = data.request;
                    window.requestId = data.request?.id;
                    this.step = 'book';
                    this.scheduledCopy = null;

                    this.$nextTick(() => {
                        this.initCalendlyWidget();
                    });
                } catch (e) {
                    this.error = e.message || 'Something went wrong.';
                } finally {
                    this.loading = false;
                }
            },
            calendlyUrl() {
                if (!this.request || !this.calendlyBaseUrl) {
                    return '';
                }

                const params = new URLSearchParams({
                    name: this.request.name ?? '',
                    email: this.request.email ?? '',
                    request_id: this.request.id,
                });

                return `${this.calendlyBaseUrl}?${params.toString()}`;
            },
            async initCalendlyWidget() {
                if (!this.request || !this.calendlyBaseUrl) {
                    return;
                }

                const widget = this.$refs.calendlyWidget;
                if (!widget) {
                    return;
                }

                widget.innerHTML = '';

                const waitForCalendly = () => new Promise((resolve, reject) => {
                    const startedAt = Date.now();
                    const check = () => {
                        if (window.Calendly && typeof window.Calendly.initInlineWidget === 'function') {
                            resolve();
                            return;
                        }

                        if (Date.now() - startedAt > 3000) {
                            reject(new Error('Calendly widget failed to load.'));
                            return;
                        }

                        setTimeout(check, 150);
                    };

                    check();
                });

                try {
                    await waitForCalendly();
                    window.Calendly.initInlineWidget({
                        url: this.calendlyUrl(),
                        parentElement: widget,
                    });
                } catch (error) {
                    this.error = error.message || 'Calendly failed to load.';
                }
            },
            async submitDeposit() {
                if (!this.request?.id) {
                    this.error = 'Start your request first.';
                    return;
                }

                this.billing = true;
                this.error = null;

                try {
                    const response = await fetch(`/api/requests/${this.request.id}/deposit`, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'Accept': 'application/json',
                            'X-CSRF-TOKEN': this.csrf(),
                        },
                        body: JSON.stringify({ payment_method: 'card' }),
                    });

                    if (!response.ok) {
                        throw new Error('Payment could not be recorded.');
                    }

                    const data = await response.json();
                    if (data.redirect) {
                        window.location = `${data.redirect}?request_id=${this.request.id}`;
                    }
                } catch (e) {
                    this.error = e.message || 'Payment failed.';
                } finally {
                    this.billing = false;
                }
            },
            initBilling() {
                if (this.billingMounted) return;

                const billingRoot = document.querySelector('#billing-root');
                if (!billingRoot) return;

                this.billingMounted = true;
            },
            init() {
                const self = this;
                let scheduleInFlight = false;
                let schedulePersisted = false;

                window.requestId ??= null;

                this.$watch('step', (value) => {
                    if (value === 'billing') {
                        this.initBilling();
                    }

                    if (value === 'book') {
                        this.$nextTick(() => {
                            this.initCalendlyWidget();
                        });
                    }
                });

                window.addEventListener('message', async (e) => {
                    if (e.origin !== 'https://calendly.com') {
                        return;
                    }

                    if (!e.data || e.data.event !== 'calendly.event_scheduled') {
                        return;
                    }

                    if (self.step !== 'book') {
                        return;
                    }

                    const widget = self.$refs.calendlyWidget;
                    const widgetVisible = widget && widget.offsetParent !== null;

                    if (!widgetVisible) {
                        return;
                    }

                    const payload = e.data.payload;

                    if (
                        !payload ||
                        !payload.event ||
                        !payload.event.uri ||
                        !payload.invitee ||
                        !payload.invitee.uri
                    ) {
                        return;
                    }

                    const requestId = Number(self.request?.id);

                    if (!Number.isInteger(requestId) || requestId <= 0) {
                        self.error = 'Missing request id; please refresh and try again.';
                        return;
                    }

                    if (schedulePersisted || scheduleInFlight) {
                        return;
                    }

                    scheduleInFlight = true;

                    if (!self.isProduction) {
                        console.info('Calendly scheduled event received', {
                            requestId,
                            eventUri: payload.event.uri,
                            inviteeUri: payload.invitee.uri,
                        });
                    }

                    let responseData = {};

                    try {
                        const response = await fetch(`/api/requests/${requestId}/scheduled`, {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'Accept': 'application/json',
                                'X-CSRF-TOKEN': self.csrf(),
                            },
                            body: JSON.stringify({
                                calendly_event_uri: payload.event.uri,
                                calendly_invitee_uri: payload.invitee.uri,
                            }),
                        });

                        try {
                            responseData = await response.json();
                        } catch (error) {
                            responseData = {};
                        }

                        if (!response.ok || !responseData.success) {
                            const validationErrors = responseData.errors
                                ? Object.values(responseData.errors).flat().join(' ')
                                : null;

                            self.error = responseData.message
                                || responseData.error
                                || validationErrors
                                || 'Scheduling could not be saved.';
                            scheduleInFlight = false;

                            if (!self.isProduction) {
                                console.warn('Scheduling persistence failed', responseData);
                            }
                            return;
                        }

                        schedulePersisted = true;
                        scheduleInFlight = false;
                        self.scheduledCopy = 'Discovery call scheduled.';
                        self.step = 'billing';

                        if (!self.isProduction) {
                            console.info('Scheduling persisted successfully', responseData);
                        }
                    } catch (error) {
                        scheduleInFlight = false;
                        self.error = 'Scheduling could not be saved.';

                        if (!self.isProduction) {
                            console.warn('Scheduling persistence request failed', error);
                        }
                    }
                });
            },
        };
    }
</script>
@endsection
