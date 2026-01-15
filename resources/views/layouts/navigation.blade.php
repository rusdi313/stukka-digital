<nav class="bg-[#001D5E] text-white sticky top-0 w-full z-50 border-b border-blue-900 shadow-xl">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-20">
            
            {{-- LOGO --}}
            <a href="{{ route('home') }}" class="flex items-center gap-2 cursor-pointer">
                <div class="w-8 h-8 bg-[#F7941D] rounded-lg flex items-center justify-center font-bold text-xl text-white">S</div>
                <span class="font-semibold text-xl tracking-tight">Stukka Events</span>
            </a>

            {{-- DESKTOP MENU --}}
            <div class="hidden md:block">
                <div class="ml-10 flex items-baseline space-x-8">
                    
                    {{-- Menu Home --}}
                    <a href="{{ route('home') }}" 
                       class="px-3 py-2 rounded-md text-sm font-medium transition-colors {{ request()->routeIs('home') ? 'text-white border-b-2 border-[#F7941D]' : 'text-blue-200 hover:text-[#F7941D]' }}">
                       Home
                    </a>

                    {{-- Menu Services --}}
                    <a href="{{ route('services') }}" 
                       class="px-3 py-2 rounded-md text-sm font-medium transition-colors {{ request()->routeIs('services') ? 'text-white border-b-2 border-[#F7941D]' : 'text-blue-200 hover:text-[#F7941D]' }}">
                       Services
                    </a>

                    {{-- Menu Portofolio --}}
                    <a href="{{ route('portfolio') }}" 
                       class="px-3 py-2 rounded-md text-sm font-medium transition-colors {{ request()->routeIs('portfolio*') ? 'text-white border-b-2 border-[#F7941D]' : 'text-blue-200 hover:text-[#F7941D]' }}">
                       Portofolio
                    </a>

                </div>
            </div>

            {{-- MENU KANAN (AUTH LOGIC) --}}
            <div class="hidden md:flex gap-4 items-center">
                
                @auth
                    {{-- KONDISI 1: SUDAH LOGIN (Tampilkan Nama & Logout) --}}
                    <div class="relative group">
                        <button class="flex items-center gap-2 text-white font-medium hover:text-[#F7941D] transition-colors focus:outline-none">
                            <span>Halo, {{ Auth::user()->name }}</span>
                            <i data-lucide="chevron-down" class="w-4 h-4"></i>
                        </button>
                        
                        {{-- Dropdown Menu --}}
                        <div class="absolute right-0 mt-2 w-48 bg-white rounded-xl shadow-lg py-2 text-gray-800 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 transform origin-top-right z-50">
                            
                            {{-- Link ke Dashboard / Admin --}}
                            <a href="{{ route('admin.events.index') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-[#001D5E]">
                                <div class="flex items-center gap-2">
                                    <i data-lucide="layout-dashboard" class="w-4 h-4 text-[#F7941D]"></i>
                                    <span class="font-bold">Mode Admin (CMS)</span>
                                </div>
                            </a>

                            {{-- Tombol Logout --}}
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-red-50 font-bold">
                                    Keluar
                                </button>
                            </form>

                            <a href="{{ route('user.dashboard') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                Status Booking Saya
                            </a>
                        </div>
                    </div>

                @else
                    {{-- KONDISI 2: BELUM LOGIN (Tampilkan Masuk & Daftar) --}}
                    <a href="{{ route('login') }}" class="text-blue-200 hover:text-white font-medium px-4 py-2 transition-colors">
                        Masuk
                    </a>
                    <a href="{{ route('register') }}" class="bg-[#F7941D] hover:bg-orange-600 text-white px-6 py-2 rounded-full font-medium transition-colors shadow-lg shadow-orange-500/30 transform hover:scale-105">
                        Daftar
                    </a>
                @endauth

            </div>

            {{-- MOBILE MENU BUTTON --}}
            <div class="-mr-2 flex md:hidden">
                <button type="button" onclick="alert('Menu Mobile belum aktif')" class="inline-flex items-center justify-center p-2 rounded-md text-blue-200 hover:text-white hover:bg-blue-900 focus:outline-none">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" /></svg>
                </button>
            </div>
        </div>
    </div>
</nav>