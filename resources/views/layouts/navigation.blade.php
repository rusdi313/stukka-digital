<nav x-data="{ open: false }" class="bg-[#001D5E] text-white sticky top-0 w-full z-50 border-b border-blue-900 shadow-xl">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-20">
            
            {{-- 1. LOGO --}}
            <a href="{{ route('home') }}" class="flex items-center gap-2 cursor-pointer">
                <img src="{{ asset('images/LOGO_KK.png') }}" 
                     alt="Stukka Events" 
                     class="h-12 w-auto object-contain">
            </a>

            {{-- 2. DESKTOP MENU (Tampil di Layar Besar) --}}
            <div class="hidden md:block">
                <div class="ml-10 flex items-baseline space-x-8">
                    
                    <a href="{{ route('home') }}" 
                       class="px-3 py-2 rounded-md text-sm font-medium transition-colors 
                       {{ request()->routeIs('home') ? 'text-white border-b-2 border-[#F7941D]' : 'text-blue-200 hover:text-[#F7941D]' }}">
                       Home
                    </a>

                    <a href="{{ route('services') }}" 
                       class="px-3 py-2 rounded-md text-sm font-medium transition-colors 
                       {{ request()->routeIs('services') ? 'text-white border-b-2 border-[#F7941D]' : 'text-blue-200 hover:text-[#F7941D]' }}">
                       Services
                    </a>

                    <a href="{{ route('portfolio') }}" 
                       class="px-3 py-2 rounded-md text-sm font-medium transition-colors 
                       {{ request()->routeIs('portfolio*') ? 'text-white border-b-2 border-[#F7941D]' : 'text-blue-200 hover:text-[#F7941D]' }}">
                       Portofolio
                    </a>

                </div>
            </div>

            {{-- 3. MENU KANAN DESKTOP (Auth Logic) --}}
            <div class="hidden md:flex gap-4 items-center">
                @auth
                    {{-- Dropdown User sudah Login --}}
                    <div class="relative group">
                        <button class="flex items-center gap-2 text-white font-medium hover:text-[#F7941D] transition-colors focus:outline-none">
                            <span>Halo, {{ Auth::user()->name }}</span>
                            <i data-lucide="chevron-down" class="w-4 h-4"></i>
                        </button>
                        
                        {{-- Dropdown Content --}}
                        <div class="absolute right-0 mt-2 w-56 bg-white rounded-xl shadow-lg py-2 text-gray-800 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 transform origin-top-right z-50 border border-gray-100">
                            
                            <div class="px-4 py-2">
                                <p class="text-sm font-extrabold text-gray-800">{{ Auth::user()->name }}</p>
                                <p class="text-xs text-gray-500">{{ Auth::user()->email }}</p>
                            </div>

                            <div class="my-1 border-t border-gray-100"></div>

                            {{-- Menu Dashboard --}}
                            @if(Auth::user()->usertype === 'admin')
                                <a href="{{ route('admin.events.index') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 hover:text-[#001D5E]">
                                    <div class="flex items-center gap-2">
                                        <i data-lucide="layout-dashboard" class="w-4 h-4 text-[#F7941D]"></i>
                                        <span class="font-bold">Dashboard Admin</span>
                                    </div>
                                </a>
                            @else
                                <a href="{{ route('user.dashboard') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 hover:text-[#001D5E]">
                                    <div class="flex items-center gap-2">
                                        <i data-lucide="clipboard-list" class="w-4 h-4 text-[#F7941D]"></i>
                                        <span class="font-bold">Status Booking</span>
                                    </div>
                                </a>
                            @endif

                            <div class="my-1 border-t border-gray-100"></div>

                            {{-- Logout --}}
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-red-50 font-bold">
                                    Keluar
                                </button>
                            </form>
                        </div>
                    </div>
                @else
                    {{-- Belum Login --}}
                    <a href="{{ route('login') }}" class="text-blue-200 hover:text-white font-medium px-4 py-2 transition-colors">Masuk</a>
                    <a href="{{ route('register') }}" class="bg-[#F7941D] hover:bg-orange-600 text-white px-6 py-2 rounded-full font-medium transition-colors shadow-lg shadow-orange-500/30 transform hover:scale-105">Daftar</a>
                @endauth
            </div>

            {{-- 4. TOMBOL MOBILE (Hamburger) --}}
            <div class="-mr-2 flex md:hidden">
                <button @click="open = ! open" type="button" class="inline-flex items-center justify-center p-2 rounded-md text-blue-200 hover:text-white hover:bg-blue-900 focus:outline-none transition-colors">
                    {{-- Ikon Garis Tiga (Buka) --}}
                    <svg :class="{'hidden': open, 'block': ! open }" class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    {{-- Ikon Silang (Tutup) --}}
                    <svg :class="{'hidden': ! open, 'block': open }" class="hidden h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    {{-- 5. ISI MENU MOBILE (Tampil Saat Tombol Diklik) --}}
    <div :class="{'block': open, 'hidden': ! open}" class="hidden md:hidden bg-[#001540] border-t border-blue-900">
        <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
            
            {{-- Mobile Links --}}
            <a href="{{ route('home') }}" class="block px-3 py-2 rounded-md text-base font-medium text-white hover:bg-blue-900 {{ request()->routeIs('home') ? 'bg-blue-900 text-[#F7941D]' : '' }}">Home</a>
            <a href="{{ route('services') }}" class="block px-3 py-2 rounded-md text-base font-medium text-blue-200 hover:text-white hover:bg-blue-900 {{ request()->routeIs('services') ? 'bg-blue-900 text-[#F7941D]' : '' }}">Services</a>
            <a href="{{ route('portfolio') }}" class="block px-3 py-2 rounded-md text-base font-medium text-blue-200 hover:text-white hover:bg-blue-900 {{ request()->routeIs('portfolio*') ? 'bg-blue-900 text-[#F7941D]' : '' }}">Portofolio</a>

            {{-- Mobile Auth Section --}}
            <div class="mt-4 border-t border-blue-800 pt-4 pb-2 px-2">
                @auth
                    <div class="px-3 mb-3">
                        <div class="font-medium text-base text-white">{{ Auth::user()->name }}</div>
                        <div class="font-medium text-sm text-gray-400">{{ Auth::user()->email }}</div>
                    </div>
                    
                    @if(Auth::user()->usertype === 'admin')
                        <a href="{{ route('admin.events.index') }}" class="block px-3 py-2 rounded-md text-base font-medium text-blue-200 hover:text-white hover:bg-blue-900">Dashboard Admin</a>
                    @else
                        <a href="{{ route('user.dashboard') }}" class="block px-3 py-2 rounded-md text-base font-medium text-blue-200 hover:text-white hover:bg-blue-900">Status Booking Saya</a>
                    @endif

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="w-full text-left block px-3 py-2 rounded-md text-base font-medium text-red-400 hover:text-red-300 hover:bg-blue-900">Keluar</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="block w-full text-center px-4 py-2 text-blue-200 hover:text-white mb-2">Masuk</a>
                    <a href="{{ route('register') }}" class="block w-full text-center px-4 py-3 bg-[#F7941D] text-white rounded-lg font-bold shadow-lg">Daftar Sekarang</a>
                @endauth
            </div>
        </div>
    </div>
</nav>