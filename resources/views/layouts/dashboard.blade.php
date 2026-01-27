<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Dashboard') - {{ config('app.name', 'Stukka Events') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://unpkg.com/lucide@latest"></script>
</head>

<body class="font-sans antialiased text-gray-900 bg-gray-50">
<div class="min-h-screen flex flex-col">

    {{-- Topbar Dashboard --}}
    <header class="bg-white/80 backdrop-blur border-b border-gray-100 sticky top-0 z-50">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="h-16 flex items-center justify-between">

                {{-- Brand --}}
                <a href="{{ url('/my-dashboard') }}" class="flex items-center gap-3">
                    <img src="{{ asset('images/Stukka1.png') }}"
                         alt="Stukka Events"
                         class="h-9 w-auto object-contain">
                    <div class="hidden sm:block">
                        <p class="font-black text-[#001D5E] leading-none">Dashboard</p>
                        <p class="text-xs text-gray-500">Kelola permintaan event Anda</p>
                    </div>
                </a>

                {{-- Nav --}}
                <nav class="hidden md:flex items-center gap-2">
                    <a href="{{ url('/my-dashboard') }}"
                       class="px-4 py-2 rounded-xl font-bold text-sm {{ request()->is('my-dashboard*') ? 'bg-blue-50 text-[#001D5E]' : 'text-gray-700 hover:bg-gray-50' }}">
                        Riwayat
                    </a>

                    <a href="{{ route('services') }}"
                       class="px-4 py-2 rounded-xl font-bold text-sm text-gray-700 hover:bg-gray-50">
                        Booking Baru
                    </a>

                    {{-- Link balik ke website (opsional) --}}
                    <a href="{{ route('home') }}"
                       class="px-4 py-2 rounded-xl font-bold text-sm text-gray-700 hover:bg-gray-50">
                        Ke Website
                    </a>
                </nav>

                {{-- User Menu --}}
                <div class="flex items-center gap-3">

                    {{-- Quick WhatsApp (opsional, ganti nomor) --}}
                    <a href="https://wa.me/6285813505686"
                       target="_blank"
                       class="hidden sm:inline-flex items-center gap-2 px-4 py-2 rounded-xl bg-white border border-gray-200 font-bold text-sm hover:bg-gray-50">
                        <i data-lucide="message-circle" class="w-4 h-4"></i>
                        Chat Admin
                    </a>

                    {{-- Dropdown akun (simple) --}}
                    <div class="relative">
                        <details class="group">
                            <summary class="list-none cursor-pointer">
                                <div class="flex items-center gap-2 px-3 py-2 rounded-xl hover:bg-gray-50 border border-transparent group-open:border-gray-200">
                                    <div class="h-9 w-9 rounded-full bg-blue-50 flex items-center justify-center font-black text-[#001D5E]">
                                        {{ strtoupper(substr(Auth::user()->name ?? 'U', 0, 1)) }}
                                    </div>
                                    <div class="hidden sm:block leading-tight">
                                        <p class="font-extrabold text-sm text-gray-800">{{ Auth::user()->name ?? 'User' }}</p>
                                        <p class="text-xs text-gray-500">{{ Auth::user()->email ?? '' }}</p>
                                    </div>
                                    <i data-lucide="chevron-down" class="w-4 h-4 text-gray-500"></i>
                                </div>
                            </summary>

                            <div class="absolute right-0 mt-2 w-56 bg-white rounded-2xl shadow-xl border border-gray-100 p-2">
                                <a href="{{ route('profile.edit') }}"
                                   class="flex items-center gap-2 px-3 py-2 rounded-xl hover:bg-gray-50 text-sm font-bold text-gray-700">
                                    <i data-lucide="user" class="w-4 h-4"></i>
                                    Profil
                                </a>

                                <div class="my-1 border-t border-gray-100"></div>

                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit"
                                            class="w-full flex items-center gap-2 px-3 py-2 rounded-xl hover:bg-red-50 text-sm font-bold text-red-600">
                                        <i data-lucide="log-out" class="w-4 h-4"></i>
                                        Logout
                                    </button>
                                </form>
                            </div>
                        </details>
                    </div>

                </div>
            </div>
        </div>
    </header>

    {{-- Main content --}}
    <main class="flex-grow">
        @yield('content')
    </main>

    {{-- Footer kecil khusus dashboard --}}
    <footer class="border-t border-gray-100 bg-white">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-6 text-sm text-gray-500 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2">
            <p>&copy; {{ date('Y') }} Stukka Events. Dashboard.</p>
            <p class="text-gray-400">Butuh bantuan? Gunakan tombol “Chat Admin”.</p>
        </div>
    </footer>

</div>

<script>
    lucide.createIcons();
</script>
</body>
</html>
