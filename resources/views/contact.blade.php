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

        <div class="bg-white border border-[#d9e8d2] rounded-2xl p-4 sm:p-6 shadow-sm">
            <div class="flex items-center gap-4">
                <div class="flex-1">
                    <div class="flex justify-between text-[11px] sm:text-xs font-semibold text-[#1f65d1]">
                        <span>Step 1 · Draft request</span>
                        <span>Step 2 · Choose path</span>
                    </div>
                    <div class="mt-2 h-2 bg-[#e8f2ff] rounded-full overflow-hidden">
                        <div class="h-full bg-[#1f65d1] transition-all duration-300" :style="`width: ${progressPercent}%`"></div>
                    </div>
                </div>
            </div>
        </div>

        <template x-if="error">
            <div class="max-w-3xl mx-auto p-4 rounded-lg bg-red-50 border border-red-200 text-red-800" x-text="error"></div>
        </template>

        <div class="grid gap-8 lg:grid-cols-3 lg:items-start">
            <div class="lg:col-span-2 space-y-8">
                <div class="muted-card shadow-md p-6 lg:p-8 space-y-6" x-show="step === 'request'" x-cloak>
                    <div class="space-y-2">
                        <p class="text-sm font-semibold text-[#1f65d1]">Step 1 of 2</p>
                        <h2 class="text-2xl font-semibold text-[#0f1b2b]">Draft your request</h2>
                        <p class="text-[#2b3f54]">We’ll save this immediately so you can move straight to booking.</p>
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

                        <p class="text-sm text-[#2b3f54]">No scheduling or pricing decisions yet — just context.</p>

                        <div class="pt-2 flex flex-col sm:flex-row sm:items-center gap-3">
                            <button type="submit" class="btn-primary w-full sm:w-auto" :disabled="loading">
                                <span x-show="!loading">Request</span>
                                <span x-show="loading">Saving...</span>
                            </button>
                            <p class="text-sm text-[#2b3f54]">We save this as a draft so you can choose the right path next.</p>
                        </div>
                    </form>
                </div>

                <div class="muted-card shadow-md p-6 lg:p-8 space-y-6" x-show="step === 'book'" x-cloak>
                    <div class="space-y-2">
                        <p class="text-sm font-semibold text-[#1f65d1]">Step 2 of 2</p>
                        <h2 class="text-2xl font-semibold text-[#0f1b2b]">Choose your path</h2>
                        <p class="text-[#2b3f54]">Pick how you want us to approach your discovery call. The call itself stays right here.</p>
                    </div>

                    <div class="grid gap-4 md:grid-cols-2">
                        <div class="border border-[#cfe0c5] rounded-2xl bg-white p-5 space-y-3 shadow-sm" :class="selectedPath === 'fix_now' ? 'ring-2 ring-[#1f65d1]' : ''">
                            <div class="flex items-center gap-2 text-green-700 font-semibold">
                                <span class="text-lg">🛠️</span>
                                <span>Fix It Now</span>
                            </div>
                            <p class="text-sm text-[#2b3f54]">We’ll aim to resolve live during the discovery call if possible.</p>
                            <button @click="choosePath('fix_now')" class="btn-primary w-full" :disabled="loading">Book discovery call</button>
                        </div>
                        <div class="border border-[#dbe6f6] rounded-2xl bg-white p-5 space-y-3 shadow-sm" :class="selectedPath === 'plan_properly' ? 'ring-2 ring-[#1f65d1]' : ''">
                            <div class="flex items-center gap-2 text-blue-700 font-semibold">
                                <span class="text-lg">🧭</span>
                                <span>Plan It Properly</span>
                            </div>
                            <p class="text-sm text-[#2b3f54]">Use the call to scope work before a larger project. Same scheduling flow.</p>
                            <button @click="choosePath('plan_properly')" class="btn-primary w-full" :disabled="loading">Book discovery call</button>
                        </div>
                    </div>

                    <template x-if="selectedPath">
                        <div class="space-y-3">
                            <div class="flex items-center justify-between flex-wrap gap-3">
                                <div>
                                    <p class="text-sm font-semibold text-[#0f1b2b]">Discovery call</p>
                                    <p class="text-sm text-[#2b3f54]">Stay on happytek.ca to finish booking. We’ll pass your intent and request ID quietly.</p>
                                </div>
                                <div class="text-xs px-3 py-1 rounded-full bg-[#e8f2ff] text-[#1f65d1] font-semibold capitalize" x-text="selectedPath.replace('_', ' ')"></div>
                            </div>
                            <div class="calendly-inline-widget border border-[#cfe0c5] rounded-2xl overflow-hidden bg-white" x-ref="calendlyWidget" x-show="showCalendly" style="min-width:320px;height:700px;"></div>
                        </div>
                    </template>

                    <template x-if="confirmation">
                        <div class="bg-green-50 border border-green-200 rounded-xl p-4 space-y-1">
                            <p class="font-semibold text-green-800">You’re scheduled</p>
                            <p class="text-green-800" x-text="confirmation"></p>
                            <p class="text-sm text-green-700">We’ll email you the details.</p>
                        </div>
                    </template>
                </div>
            </div>

            <div class="card-surface shadow-sm p-6 space-y-5 lg:p-7 lg:space-y-6">
                <div class="space-y-2">
                    <h2 class="text-xl font-semibold text-[#0f1b2b]">What happens next</h2>
                    <p class="text-sm text-[#2b3f54]">Simple steps so you know what to expect.</p>
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
                        <span>The discovery call is embedded — no new tabs.</span>
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
    </div>
</section>

<script>
    function contactFlow() {
        return {
            step: 'request',
            loading: false,
            error: null,
            confirmation: null,
            request: null,
            selectedPath: null,
            showCalendly: false,
            calendlyBaseUrl: '{{ config('services.calendly.discovery_url') }}',
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
                service_name: '',
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
                return this.step === 'request' ? 50 : 100;
            },
            get calendlyUrl() {
                if (!this.request || !this.calendlyBaseUrl) {
                    return '';
                }

                const params = new URLSearchParams({
                    name: this.request.name ?? '',
                    email: this.request.email ?? '',
                    request_id: this.request.id,
                    utm_content: this.request.id,
                });

                return `${this.calendlyBaseUrl}?${params.toString()}`;
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
                    this.confirmation = null;
                } catch (e) {
                    this.error = e.message || 'Something went wrong.';
                } finally {
                    this.loading = false;
                }
            },
            async choosePath(path) {
                if (!this.request?.id) {
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
                            request_id: this.request.id,
                            path,
                        }),
                    });

                    if (!response.ok) {
                        throw new Error('Unable to continue.');
                    }

                    const data = await response.json();
                    this.request = data.request;
                    this.selectedPath = path;
                    this.step = 'book';
                    this.showCalendly = true;
                    this.loadCalendly();
                } catch (e) {
                    this.error = e.message || 'Something went wrong.';
                } finally {
                    this.loading = false;
                }
            },
            loadCalendly() {
                if (!this.calendlyBaseUrl) {
                    return;
                }

                this.$nextTick(() => {
                    const widget = this.$refs.calendlyWidget;

                    if (!widget) {
                        return;
                    }

                    widget.setAttribute('data-url', this.calendlyUrl);

                    if (window.Calendly && typeof Calendly.initInlineWidget === 'function') {
                        Calendly.initInlineWidget({
                            url: this.calendlyUrl,
                            parentElement: widget,
                        });
                    }
                });
            },
            initListeners() {
                window.requestId ??= null;
                window.persistingSchedule ??= false;

                window.addEventListener('message', function (e) {
                    // 1. HARD origin filter (ignore GTM / GA / analytics noise)
                    if (e.origin !== 'https://calendly.com') {
                        console.info('Ignoring non-Calendly message', e.data);
                        return;
                    }

                    // 2. HARD event name filter
                    if (!e.data || e.data.event !== 'calendly.event_scheduled') {
                        console.info('Ignoring non-scheduled Calendly message', e.data);
                        return;
                    }

                    // 3. HARD request id gating
                    if (!window.requestId) {
                        console.warn('Calendly event received before requestId is set', e.data);
                        return;
                    }

                    // 4. HARD payload shape validation
                    const payload = e.data.payload;

                    if (
                        !payload ||
                        !payload.event ||
                        !payload.event.uri ||
                        !payload.invitee ||
                        !payload.invitee.uri
                    ) {
                        console.error(
                            'Calendly embed payload missing required fields',
                            e.data
                        );
                        return;
                    }

                    // 5. Idempotency guard (lock only after backend success)
                    if (window.persistingSchedule) {
                        console.info('Scheduling already persisted; ignoring duplicate message', e.data);
                        return;
                    }

                    console.info('Accepted Calendly scheduled event', payload);

                    // 6. POST ONLY URIs to backend
                    fetch(`/api/requests/${window.requestId}/scheduled`, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'Accept': 'application/json',
                        },
                        body: JSON.stringify({
                            calendly_event_uri: payload.event.uri,
                            calendly_invitee_uri: payload.invitee.uri,
                        }),
                    })
                        .then(res => res.json())
                        .then(data => {
                            if (data.success) {
                                window.persistingSchedule = true;
                                console.info('Scheduling persisted successfully', data);
                                // advance to Step 3 ONLY after backend confirmation
                                this.confirmation = 'We received your booking.';
                            } else {
                                console.warn('Scheduling persistence failed', data);
                                window.persistingSchedule = false;
                            }
                        })
                        .catch(() => {
                            console.error('Scheduling persistence request failed');
                            window.persistingSchedule = false;
                        });
                }.bind(this));
            },
        };
    }
</script>
@endsection
