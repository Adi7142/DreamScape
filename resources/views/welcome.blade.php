<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'DreamScape') }}</title>

    <!-- Font -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-slate-950 text-white">
    <div class="relative isolate min-h-screen overflow-hidden">
        <!-- Background glow -->
        <div class="pointer-events-none absolute inset-0 -z-10">
            <div class="absolute -top-40 left-1/2 h-[520px] w-[520px] -translate-x-1/2 rounded-full bg-violet-500/25 blur-3xl"></div>
            <div class="absolute top-24 left-10 h-[420px] w-[420px] rounded-full bg-emerald-400/15 blur-3xl"></div>
            <div class="absolute bottom-0 right-0 h-[520px] w-[520px] rounded-full bg-fuchsia-500/10 blur-3xl"></div>
            <div class="absolute inset-0 bg-[radial-gradient(circle_at_top,rgba(255,255,255,0.07),transparent_55%)]"></div>
        </div>

        <!-- Top nav -->
        <header class="mx-auto flex w-full max-w-6xl items-center justify-between px-6 py-6">
            <a href="/" class="group inline-flex items-center gap-3">
                <span class="grid h-10 w-10 place-items-center rounded-2xl bg-white/10 ring-1 ring-white/15 shadow-[0_12px_40px_rgba(0,0,0,0.35)]">
                    <span class="h-2.5 w-2.5 rounded-full bg-gradient-to-br from-violet-300 to-emerald-300"></span>
                </span>
                <span class="text-sm font-semibold tracking-wide text-white/90 group-hover:text-white transition">{{ config('app.name', 'DreamScape') }}</span>
            </a>

            @if (Route::has('login'))
                <nav class="flex items-center gap-2 sm:gap-3">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="inline-flex items-center justify-center rounded-xl px-4 py-2 text-sm font-medium bg-white/10 hover:bg-white/15 ring-1 ring-white/15 transition">
                            Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="inline-flex items-center justify-center rounded-xl px-4 py-2 text-sm font-medium text-white/85 hover:text-white hover:bg-white/5 ring-1 ring-white/10 transition">
                            Log in
                        </a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="inline-flex items-center justify-center rounded-xl px-4 py-2 text-sm font-semibold bg-gradient-to-br from-violet-400/95 to-emerald-300/70 text-slate-950 hover:from-violet-300 hover:to-emerald-200 transition shadow-[0_18px_60px_rgba(124,92,255,0.22)]">
                                Register
                            </a>
                        @endif
                    @endauth
                </nav>
            @endif
        </header>

        <!-- Hero -->
        <main class="mx-auto w-full max-w-6xl px-6 pb-16 pt-8 sm:pt-14">
            <div class="grid items-center gap-10 lg:grid-cols-2">
                <section>
                    <p class="inline-flex items-center gap-2 rounded-full bg-white/5 px-3 py-1 text-xs font-medium text-white/80 ring-1 ring-white/10">
                        <span class="h-1.5 w-1.5 rounded-full bg-emerald-300"></span>
                        Nieuwe wereld, nieuwe dromen
                    </p>

                    <h1 class="mt-5 text-4xl font-semibold tracking-tight sm:text-5xl">
                        Welcome to <span class="bg-gradient-to-r from-violet-300 via-fuchsia-300 to-emerald-200 bg-clip-text text-transparent">DreamScape</span>
                    </h1>

                    <p class="mt-4 max-w-xl text-base leading-relaxed text-white/70">
                        Een rustige, cinematic plek om ideeën te bouwen. Deze startpagina gebruikt jouw Tailwind setup (app.css) en houdt het clean, modern en consistent.
                    </p>

                    <div class="mt-7 flex flex-wrap gap-3">
                        @auth
                            <a href="{{ url('/dashboard') }}" class="inline-flex items-center justify-center rounded-xl px-5 py-3 text-sm font-semibold bg-gradient-to-br from-violet-400/95 to-emerald-300/70 text-slate-950 hover:from-violet-300 hover:to-emerald-200 transition">
                                Naar dashboard
                            </a>
                        @else
                            <a href="{{ route('register') }}" class="inline-flex items-center justify-center rounded-xl px-5 py-3 text-sm font-semibold bg-gradient-to-br from-violet-400/95 to-emerald-300/70 text-slate-950 hover:from-violet-300 hover:to-emerald-200 transition">
                                Maak account
                            </a>
                            <a href="{{ route('login') }}" class="inline-flex items-center justify-center rounded-xl px-5 py-3 text-sm font-medium bg-white/10 hover:bg-white/15 ring-1 ring-white/15 transition">
                                Log in
                            </a>
                        @endauth

                        <a href="https://laravel.com/docs" target="_blank" rel="noreferrer" class="inline-flex items-center justify-center rounded-xl px-5 py-3 text-sm font-medium text-white/80 hover:text-white ring-1 ring-white/10 hover:bg-white/5 transition">
                            Docs
                            <span aria-hidden="true" class="ml-1">↗</span>
                        </a>
                    </div>

                    <div class="mt-10 grid gap-3 sm:grid-cols-3">
                        <div class="rounded-2xl bg-white/5 p-4 ring-1 ring-white/10">
                            <p class="text-sm font-semibold">Consistent</p>
                            <p class="mt-1 text-xs text-white/65">Tokens + herbruikbare styles</p>
                        </div>
                        <div class="rounded-2xl bg-white/5 p-4 ring-1 ring-white/10">
                            <p class="text-sm font-semibold">Snel</p>
                            <p class="mt-1 text-xs text-white/65">Tailwind-first workflow</p>
                        </div>
                        <div class="rounded-2xl bg-white/5 p-4 ring-1 ring-white/10">
                            <p class="text-sm font-semibold">Modern</p>
                            <p class="mt-1 text-xs text-white/65">Glass + gradients + focus</p>
                        </div>
                    </div>
                </section>

                <!-- Right card -->
                <aside class="relative">
                    <div class="rounded-3xl bg-white/5 p-6 ring-1 ring-white/10 shadow-[0_22px_70px_rgba(0,0,0,0.5)]">
                        <div class="flex items-center justify-between">
                            <p class="text-sm font-semibold text-white/90">Start checklist</p>
                            <span class="rounded-full bg-emerald-300/15 px-2 py-1 text-xs font-medium text-emerald-200 ring-1 ring-emerald-200/20">ready</span>
                        </div>

                        <ul class="mt-4 space-y-3 text-sm">
                            <li class="flex gap-3 rounded-2xl bg-black/20 p-3 ring-1 ring-white/10">
                                <span class="mt-0.5 h-2 w-2 shrink-0 rounded-full bg-violet-300"></span>
                                <div>
                                    <p class="font-medium">Maak je global styling</p>
                                    <p class="text-white/65 text-xs mt-0.5">resources/css/app.css (tokens + components)</p>
                                </div>
                            </li>
                            <li class="flex gap-3 rounded-2xl bg-black/20 p-3 ring-1 ring-white/10">
                                <span class="mt-0.5 h-2 w-2 shrink-0 rounded-full bg-emerald-200"></span>
                                <div>
                                    <p class="font-medium">Maak een layout</p>
                                    <p class="text-white/65 text-xs mt-0.5">resources/views/layouts/app.blade.php</p>
                                </div>
                            </li>
                            <li class="flex gap-3 rounded-2xl bg-black/20 p-3 ring-1 ring-white/10">
                                <span class="mt-0.5 h-2 w-2 shrink-0 rounded-full bg-fuchsia-200"></span>
                                <div>
                                    <p class="font-medium">Bouw je eerste views</p>
                                    <p class="text-white/65 text-xs mt-0.5">Home · Dashboard · Profile</p>
                                </div>
                            </li>
                        </ul>

                        <div class="mt-5 rounded-2xl bg-gradient-to-br from-white/10 to-white/5 p-4 ring-1 ring-white/10">
                            <p class="text-xs text-white/70">
                                Tip: als je wilt kan ik ook meteen een <span class="text-white/90 font-medium">layouts/app.blade.php</span> maken zodat al je views dezelfde header/footer krijgen.
                            </p>
                        </div>
                    </div>
                </aside>
            </div>

            <footer class="mt-14 text-center text-xs text-white/55">
                <p>© {{ date('Y') }} {{ config('app.name', 'DreamScape') }} — built with Laravel + Tailwind.</p>
            </footer>
        </main>
    </div>
</body>
</html>