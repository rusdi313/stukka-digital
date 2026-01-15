<nav class="bg-[#001D5E] text-white sticky top-0 w-full z-50 border-b border-blue-900 shadow-xl">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-20">
            
            {{-- Logo --}}
            <a href="{{ route('home') }}" class="flex items-center gap-2 cursor-pointer">
                <div class="w-8 h-8 bg-[#F7941D] rounded-lg flex items-center justify-center font-bold text-xl text-white">S</div>
                <span class="font-semibold text-xl tracking-tight">Stukka Events</span>
            </a>

            {{-- Desktop Menu --}}
            <div class="hidden md:block">
                <div class="ml-10 flex items-baseline space-x-8">
                    
                    {{-- Menu: HOME --}}
                    <a href="{{ route('home') }}" 
                       class="px-3 py-2 rounded-md text-sm font-medium transition-colors 
                       {{ request()->routeIs('home') ? 'text-white border-b-2 border-[#F7941D]' : 'text-blue-200 hover:text-[#F7941D]' }}">
                       Home
                    </a>

                    {{-- Menu: PORTOFOLIO (UPDATED) --}}
                    {{-- Perhatikan: route('portfolio') dan routeIs('portfolio*') --}}
                    <a href="{{ route('portfolio') }}" 
                       class="px-3 py-2 rounded-md text-sm font-medium transition-colors 
                       {{ request()->routeIs('portfolio*') ? 'text-white border-b-2 border-[#F7941D]' : 'text-blue-200 hover:text-[#F7941D]' }}">
                       Portofolio
                    </a>

                    {{-- Menu: SERVICES (Anchor Link) --}}
                    <a href="{{ route('services') }}" 
                    class="px-3 py-2 rounded-md text-sm font-medium transition-colors 
                    {{ request()->routeIs('services') ? 'text-white border-b-2 border-[#F7941D]' : 'text-blue-200 hover:text-[#F7941D]' }}">
                    Services
                    </a>

                </div>
            </div>

            {{-- Auth Buttons --}}
            <div class="hidden md:flex gap-4">
                {{-- Gunakan route() helper agar lebih aman jika URL berubah --}}
                <a href="{{ route('login') }}" class="text-blue-200 hover:text-white font-medium px-4 py-2 transition-colors">
                    Masuk
                </a>
                <a href="{{ route('register') }}" class="bg-[#F7941D] hover:bg-orange-600 text-white px-6 py-2 rounded-full font-medium transition-colors shadow-lg shadow-orange-500/30 transform hover:scale-105">
                    Daftar
                </a>
            </div>

            {{-- Mobile Menu Button --}}
            <div class="-mr-2 flex md:hidden">
                <button type="button" onclick="alert('Simulasi: Menu Mobile')" class="inline-flex items-center justify-center p-2 rounded-md text-blue-200 hover:text-white hover:bg-blue-900 focus:outline-none">
                    <i data-lucide="menu" class="h-6 w-6"></i>
                </button>
            </div>
        </div>
    </div>
</nav>