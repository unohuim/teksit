<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'HappyTek — Easily Solved. Remote tech help that feels finished')</title>
    <meta name="description" content="HappyTek keeps everyday tech handled for Canadians with low tech energy, founders, and small teams. Clear pricing, reliable support, and outcomes that are easily solved.">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="bg-white text-[#0f1b2b] antialiased">
    <div x-data="{ open: false }" class="min-h-screen flex flex-col">
        <header class="bg-white border-b border-[#d9e8d2] sticky top-0 z-20">
            <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex items-center justify-between py-4 bg-white">
                    <a href="/" class="flex items-center gap-3 group">
                        
                        <img src="{{ asset('images/happytek_logo_white.svg') }}" alt="HappyTek" class="hidden sm:block h-16 w-auto drop-shadow-[0_12px_28px_rgba(19,49,92,0.15)]" loading="lazy">
                        
                    </a>
                    <nav class="hidden md:flex items-center gap-8 text-sm font-medium">
                        <a href="/" class="text-[#254776] hover:text-[#1f65d1] transition">Home</a>
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
                <div class="px-4 py-3 space-y-2">
                    <a href="/" class="block text-[#13315c] font-semibold">Home</a>
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
