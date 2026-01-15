<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Admin Panel - Stukka Events</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://unpkg.com/lucide@latest"></script>
    
    <style>
        /* Custom Scrollbar untuk Sidebar */
        .sidebar-scroll::-webkit-scrollbar { width: 6px; }
        .sidebar-scroll::-webkit-scrollbar-track { background: #001540; }
        .sidebar-scroll::-webkit-scrollbar-thumb { background: #F7941D; border-radius: 10px; }
    </style>
</head>
<body class="font-sans antialiased bg-gray-100">

    <div class="flex h-screen overflow-hidden">
        
        {{-- ======================== --}}
        {{-- 1. SIDEBAR (MENU KIRI)   --}}
        {{-- ======================== --}}
        <aside class="w-64 bg-[#001D5E] text-white flex-shrink-0 hidden md:flex flex-col shadow-2xl z-20">
            
            {{-- Logo Area --}}
            <div class="h-20 flex items-center px-6 border-b border-blue-900 bg-[#001542]">
                <a href="{{ route('home') }}" class="flex items-center gap-2 font-black text-xl tracking-tight hover:text-[#F7941D] transition-colors">
                    <span class="bg-[#F7941D] text-white w-8 h-8 flex items-center justify-center rounded-lg">S</span>
                    STUKKA CMS
                </a>
            </div>

            {{-- Menu Items --}}
            <nav class="flex-1 overflow-y-auto sidebar-scroll py-6 px-3 space-y-2">
                
                {{-- Dashboard --}}
                <p class="px-3 text-xs font-bold text-blue-300 uppercase tracking-wider mb-2 mt-2">Main</p>
                <a href="{{ route('admin.index') }}" 
                   class="flex items-center gap-3 px-3 py-3 rounded-xl transition-all group {{ request()->routeIs('admin.index') ? 'bg-[#F7941D] text-white shadow-lg shadow-orange-500/30' : 'text-blue-100 hover:bg-blue-800 hover:text-white' }}">
                    <i data-lucide="layout-dashboard" class="w-5 h-5"></i>
                    <span class="font-medium">Dashboard</span>
                </a>

                {{-- Content Management --}}
                <p class="px-3 text-xs font-bold text-blue-300 uppercase tracking-wider mb-2 mt-6">Content Management</p>
                
                <a href="{{ route('admin.events.index') }}" 
                   class="flex items-center gap-3 px-3 py-3 rounded-xl transition-all group {{ request()->routeIs('admin.events.*') ? 'bg-[#F7941D] text-white shadow-lg shadow-orange-500/30' : 'text-blue-100 hover:bg-blue-800 hover:text-white' }}">
                    <i data-lucide="briefcase" class="w-5 h-5"></i>
                    <span class="font-medium">Portofolio Project</span>
                </a>

                <a href="{{ route('admin.clients.index') }}" 
                   class="flex items-center gap-3 px-3 py-3 rounded-xl transition-all group {{ request()->routeIs('admin.clients.*') ? 'bg-[#F7941D] text-white shadow-lg shadow-orange-500/30' : 'text-blue-100 hover:bg-blue-800 hover:text-white' }}">
                    <i data-lucide="building-2" class="w-5 h-5"></i>
                    <span class="font-medium">Client Trust (Logo)</span>
                </a>

                <a href="{{ route('admin.testimonials.index') }}" 
                   class="flex items-center gap-3 px-3 py-3 rounded-xl transition-all group {{ request()->routeIs('admin.testimonials.*') ? 'bg-[#F7941D] text-white shadow-lg shadow-orange-500/30' : 'text-blue-100 hover:bg-blue-800 hover:text-white' }}">
                    <i data-lucide="message-square-quote" class="w-5 h-5"></i>
                    <span class="font-medium">Testimoni Client</span>
                </a>

                <a href="{{ route('admin.bookings.index') }}" 
                     class="flex items-center gap-3 px-3 py-3 rounded-xl transition-all group {{ request()->routeIs('admin.bookings.*') ? 'bg-[#F7941D] text-white shadow-lg' : 'text-blue-100 hover:bg-blue-800' }}">
                    <i data-lucide="calendar-check" class="w-5 h-5"></i>
                    <span class="font-medium">Kelola Booking</span>
                </a>

            </nav>

            {{-- Footer Sidebar --}}
            <div class="p-4 border-t border-blue-900 bg-[#001542]">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-full bg-blue-700 flex items-center justify-center font-bold text-white">
                        {{ substr(Auth::user()->name, 0, 1) }}
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-medium text-white truncate">{{ Auth::user()->name }}</p>
                        <p class="text-xs text-blue-300 truncate">Administrator</p>
                    </div>
                    
                    {{-- Logout --}}
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="text-gray-400 hover:text-red-400 transition-colors" title="Logout">
                            <i data-lucide="log-out" class="w-5 h-5"></i>
                        </button>
                    </form>
                </div>
            </div>
        </aside>

        {{-- ======================== --}}
        {{-- 2. MAIN CONTENT (KANAN)  --}}
        {{-- ======================== --}}
        <div class="flex-1 flex flex-col h-screen overflow-hidden bg-gray-50">
            
            {{-- Top Header (Mobile & Title) --}}
            <header class="h-20 bg-white border-b border-gray-200 flex items-center justify-between px-8 shadow-sm z-10">
                <h2 class="text-xl font-black text-[#001D5E] tracking-tight">
                    @yield('title', 'Admin Dashboard')
                </h2>

                <div class="flex items-center gap-4">
                    <a href="{{ route('home') }}" class="text-sm font-bold text-gray-500 hover:text-[#001D5E] flex items-center gap-2 bg-gray-100 px-4 py-2 rounded-full transition-colors">
                        <i data-lucide="globe" class="w-4 h-4"></i> Lihat Website
                    </a>
                </div>
            </header>

            {{-- Scrollable Content --}}
            <main class="flex-1 overflow-x-hidden overflow-y-auto p-8">
                @yield('content')
            </main>
        
        </div>

    </div>

    <script>
        lucide.createIcons();
    </script>
</body>
</html>