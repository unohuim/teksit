<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'HappyTek — Easily Solved. Remote tech help that feels finished')</title>
    <meta name="description" content="HappyTek keeps everyday tech handled for Canadians with low tech energy, founders, and small teams. Clear pricing, reliable support, and outcomes that are easily solved.">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="bg-gradient-to-br from-[#f6fbf3] via-white to-[#eef4ff] backdrop-blur border-b border-[#d9e8d2] sticky top-0 z-20 shadow-[0_6px_30px_-20px_rgba(0,0,0,0.25)] text-[#0f1b2b] antialiased">
    <div x-data="{ open: false, servicesOpen: false }" class="min-h-screen flex flex-col">
        <header class="bg-white border-b border-[#d9e8d2] sticky top-0 z-20">
            <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex items-center justify-between py-1">
                    <a href="/" class="flex items-center group">
                        <img src="{{ asset('images/happytek_logo_trans.svg') }}" alt="HappyTek" class="h-12 sm:h-20 md:h-24 lg:h-26 w-auto" loading="lazy">
                        <span class="ml-2 text-[11px] sm:text-xs font-medium text-[#2b3f54] opacity-70 leading-tight">Easily Solved.</span>
                    </a>
                    <nav class="hidden md:flex items-center gap-8 text-sm font-medium">
                        <a href="/" class="text-[#254776] hover:text-[#1f65d1] transition">Home</a>
                        <div class="relative" @mouseleave="servicesOpen = false" @mouseenter="servicesOpen = true" @focusin="servicesOpen = true">
                            <a href="{{ url('/#services') }}" class="inline-flex items-center gap-1 text-[#254776] hover:text-[#1f65d1] transition focus:outline-none" @focus="servicesOpen = true">
                                Services
                                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M6 9l6 6 6-6" />
                                </svg>
                            </a>
                            <div x-cloak x-show="servicesOpen" x-transition class="absolute left-0 mt-3 w-[520px] bg-white border border-[#d9e8d2] shadow-xl rounded-xl p-4 grid grid-cols-2 gap-4">
                                <div class="space-y-3">
                                    <p class="text-xs font-semibold text-[#1f65d1] uppercase">Individuals</p>
                                    <div class="space-y-2 text-sm">
                                        <a href="{{ url('/services/individuals/fix-it-now') }}" class="dropdown-link">Fix It Now</a>
                                        <a href="{{ url('/services/individuals/setups') }}" class="dropdown-link">Setups</a>
                                        <a href="{{ url('/services/individuals/wi-fi-and-networkables') }}" class="dropdown-link">Wi-Fi &amp; Networkables</a>
                                        <a href="{{ url('/services/individuals/security-and-passwords') }}" class="dropdown-link">Security &amp; Passwords</a>
                                    </div>
                                </div>
                                <div class="space-y-3">
                                    <p class="text-xs font-semibold text-[#1f65d1] uppercase">Professionals</p>
                                    <div class="space-y-2 text-sm">
                                        <a href="{{ url('/services/professionals/brand-launch-support') }}" class="dropdown-link">Brand Launch Support</a>
                                        <a href="{{ url('/services/professionals/migrations') }}" class="dropdown-link">Migrations</a>
                                        <a href="{{ url('/services/professionals/leads-management-and-bookings') }}" class="dropdown-link">Leads Mgmt &amp; Bookings</a>
                                        <a href="{{ url('/services/professionals/automations-and-efficiency') }}" class="dropdown-link">Automations &amp; Efficiency</a>
                                        <a href="{{ url('/services/professionals/ai-integrations') }}" class="dropdown-link">AI Integrations</a>
                                    </div>
                                </div>
                                <div class="space-y-3 col-span-2 border-t border-[#e6f0e2] pt-4">
                                    <p class="text-xs font-semibold text-[#1f65d1] uppercase">Small Teams</p>
                                    <div class="grid grid-cols-2 gap-2 text-sm">
                                        <a href="{{ url('/services/teams/onboarding-support') }}" class="dropdown-link">Onboarding Support</a>
                                        <a href="{{ url('/services/teams/cloud-migrations') }}" class="dropdown-link">Cloud Migrations</a>
                                        <a href="{{ url('/services/teams/shared-info-and-collaboration') }}" class="dropdown-link">Shared Info &amp; Collaboration</a>
                                        <a href="{{ url('/services/teams/tool-consolidation') }}" class="dropdown-link">Tool Consolidation</a>
                                        <a href="{{ url('/services/teams/ai-integrations') }}" class="dropdown-link">AI Integrations</a>
                                        <a href="{{ url('/services/teams/project-concierge') }}" class="dropdown-link">Project Concierge</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="/pricing" class="text-[#254776] hover:text-[#1f65d1] transition">Pricing</a>
                        <a href="/contact" class="text-[#254776] hover:text-[#1f65d1] transition">Contact</a>
                        <a href="/contact" class="btn-primary">Get it fixed</a>
                    </nav>
                    <button @click="open = !open" class="md:hidden inline-flex items-center justify-center rounded-md p-2 text-[#254776] hover:bg-[#e8f2ff] focus:outline-none" aria-label="Toggle navigation">
                        <svg x-show="!open" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                        <svg x-show="open" x-cloak xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M6 6l12 12M6 18L18 6" />
                        </svg>
                    </button>
                </div>
            </div>
            <div x-show="open" x-transition class="md:hidden border-t border-[#d9e8d2] bg-white shadow-sm">
                <div class="px-4 py-4 space-y-3 text-sm">
                    <a href="/" class="block text-[#13315c] font-semibold">Home</a>
                    <div x-data="{ mobileServices: false }" class="border border-[#e6f0e2] rounded-lg">
                        <button @click="mobileServices = !mobileServices" class="w-full flex items-center justify-between px-3 py-2 text-left font-semibold text-[#13315c]">
                            <span>Services</span>
                            <svg :class="{ 'rotate-180': mobileServices }" class="h-4 w-4 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M6 9l6 6 6-6" />
                            </svg>
                        </button>
                        <div x-show="mobileServices" x-transition class="px-3 pb-3 space-y-4">
                            <div class="space-y-2">
                                <p class="text-xs font-semibold text-[#1f65d1] uppercase">Individuals</p>
                                <div class="space-y-1">
                                    <a href="{{ url('/services/individuals/fix-it-now') }}" class="mobile-dropdown">Fix It Now</a>
                                    <a href="{{ url('/services/individuals/setups') }}" class="mobile-dropdown">Setups</a>
                                    <a href="{{ url('/services/individuals/wi-fi-and-networkables') }}" class="mobile-dropdown">Wi-Fi &amp; Networkables</a>
                                    <a href="{{ url('/services/individuals/security-and-passwords') }}" class="mobile-dropdown">Security &amp; Passwords</a>
                                </div>
                            </div>
                            <div class="space-y-2">
                                <p class="text-xs font-semibold text-[#1f65d1] uppercase">Professionals</p>
                                <div class="space-y-1">
                                    <a href="{{ url('/services/professionals/brand-launch-support') }}" class="mobile-dropdown">Brand Launch Support</a>
                                    <a href="{{ url('/services/professionals/migrations') }}" class="mobile-dropdown">Migrations</a>
                                    <a href="{{ url('/services/professionals/leads-management-and-bookings') }}" class="mobile-dropdown">Leads Mgmt &amp; Bookings</a>
                                    <a href="{{ url('/services/professionals/automations-and-efficiency') }}" class="mobile-dropdown">Automations &amp; Efficiency</a>
                                    <a href="{{ url('/services/professionals/ai-integrations') }}" class="mobile-dropdown">AI Integrations</a>
                                </div>
                            </div>
                            <div class="space-y-2">
                                <p class="text-xs font-semibold text-[#1f65d1] uppercase">Small Teams</p>
                                <div class="space-y-1">
                                    <a href="{{ url('/services/teams/onboarding-support') }}" class="mobile-dropdown">Onboarding Support</a>
                                    <a href="{{ url('/services/teams/cloud-migrations') }}" class="mobile-dropdown">Cloud Migrations</a>
                                    <a href="{{ url('/services/teams/shared-info-and-collaboration') }}" class="mobile-dropdown">Shared Info &amp; Collaboration</a>
                                    <a href="{{ url('/services/teams/tool-consolidation') }}" class="mobile-dropdown">Tool Consolidation</a>
                                    <a href="{{ url('/services/teams/ai-integrations') }}" class="mobile-dropdown">AI Integrations</a>
                                    <a href="{{ url('/services/teams/project-concierge') }}" class="mobile-dropdown">Project Concierge</a>
                                </div>
                            </div>
                            <a href="{{ url('/#services') }}" class="block text-[#1f65d1] font-semibold">View all services</a>
                        </div>
                    </div>
                    <a href="/pricing" class="block text-[#13315c] font-semibold">Pricing</a>
                    <a href="/contact" class="block text-[#13315c] font-semibold">Contact</a>
                    <a href="/contact" class="inline-flex w-full justify-center btn-primary">Get it fixed</a>
                </div>
            </div>
        </header>

        <main class="flex-1">
            @yield('content')
        </main>

        <footer class="bg-gradient-to-br from-[#1f65d1] via-[#164d9c] to-[#0f2f76] text-slate-50 mt-16">
            <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
                <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-6">
                    <div class="space-y-2 max-w-xl">
                        <p class="text-lg font-semibold">HappyTek — Easily Solved.</p>
                        <p class="text-sm text-slate-100/80">Remote tech help that feels finished. Reliable fixes, setup done right, and clear follow-through for low tech energy households, founders, and small teams.</p>
                        <p class="text-sm text-slate-100/80">hello@happytek.ca</p>
                    </div>
                    <div class="flex items-center gap-6 text-sm">
                        <a href="/" class="hover:text-white">Home</a>
                        <a href="/pricing" class="hover:text-white">Pricing</a>
                        <a href="/contact" class="hover:text-white">Contact</a>
                    </div>
                </div>
                <p class="mt-8 text-sm text-slate-200/80">© {{ date('Y') }} HappyTek. Remote tech help across Canada.</p>
            </div>
        </footer>
    </div>
</body>
</html>
