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
<body class="bg-slate-50 text-slate-900 antialiased">
    <div x-data="{ open: false }" class="min-h-screen flex flex-col">
        <header class="bg-white/90 backdrop-blur border-b border-slate-200/70 sticky top-0 z-20">
            <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex items-center justify-between py-4">
                    <div class="flex items-center gap-3">
                        <div class="h-10 w-10 rounded-lg bg-slate-900 text-white flex items-center justify-center font-semibold shadow-sm">H</div>
                        <a href="/" class="text-xl font-semibold tracking-tight text-slate-900">HappyTek</a>
                    </div>
                    <nav class="hidden md:flex items-center gap-8 text-sm font-medium">
                        <a href="/" class="text-slate-700 hover:text-slate-900 transition">Home</a>
                        <a href="/pricing" class="text-slate-700 hover:text-slate-900 transition">Pricing</a>
                        <a href="/contact" class="text-slate-700 hover:text-slate-900 transition">Contact</a>
                        <a href="/contact" class="inline-flex items-center gap-2 bg-slate-900 text-white px-4 py-2 rounded-lg shadow-sm hover:bg-slate-800 transition">Get it fixed</a>
                    </nav>
                    <button @click="open = !open" class="md:hidden inline-flex items-center justify-center rounded-md p-2 text-slate-700 hover:bg-slate-100 focus:outline-none" aria-label="Toggle navigation">
                        <svg x-show="!open" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                        <svg x-show="open" x-cloak xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M6 6l12 12M6 18L18 6" />
                        </svg>
                    </button>
                </div>
            </div>
            <div x-show="open" x-transition class="md:hidden border-t border-slate-200 bg-white shadow-sm">
                <div class="px-4 py-3 space-y-2">
                    <a href="/" class="block text-slate-900 font-semibold">Home</a>
                    <a href="/pricing" class="block text-slate-900 font-semibold">Pricing</a>
                    <a href="/contact" class="block text-slate-900 font-semibold">Contact</a>
                    <a href="/contact" class="inline-flex w-full justify-center bg-slate-900 text-white px-4 py-2 rounded-lg shadow-sm hover:bg-slate-800 transition">Get it fixed</a>
                </div>
            </div>
        </header>

        <main class="flex-1">
            @yield('content')
        </main>

        <footer class="bg-slate-900 text-slate-100 mt-16">
            <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
                <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-6">
                    <div class="space-y-2 max-w-xl">
                        <p class="text-lg font-semibold">HappyTek — Easily Solved.</p>
                        <p class="text-sm text-slate-300">Remote tech help that feels finished. Reliable fixes, setup done right, and clear follow-through for low tech energy households, founders, and small teams.</p>
                        <p class="text-sm text-slate-300">hello@happytek.ca</p>
                    </div>
                    <div class="flex items-center gap-6 text-sm">
                        <a href="/" class="hover:text-white">Home</a>
                        <a href="/pricing" class="hover:text-white">Pricing</a>
                        <a href="/contact" class="hover:text-white">Contact</a>
                    </div>
                </div>
                <p class="mt-8 text-sm text-slate-500">© {{ date('Y') }} HappyTek. Remote tech help across Canada.</p>
            </div>
        </footer>
    </div>
</body>
</html>
