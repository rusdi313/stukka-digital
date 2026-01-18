<footer class="bg-[#001D5E] text-white pt-16 pb-8 border-t border-blue-900">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        {{-- Grid 4 Kolom --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 mb-12">
            
            {{-- Kolom 1: Brand & Tagline --}}
            <div>
                {{-- Logo Stukka (Sesuaikan path gambarnya) --}}
                <div class="mb-6">
                    {{-- Jika pakai Gambar --}}
                    {{-- <img src="{{ asset('images/logo-white.png') }}" alt="Stukka Logo" class="h-10"> --}}
                    
                    {{-- Jika pakai Teks (Sesuai Gambar) --}}
                    <h2 class="text-4xl font-black tracking-widest uppercase">
                        STU<span class="text-[#F7941D]">K</span><span class="text-blue-400">K</span>A
                    </h2>
                </div>
                <p class="text-blue-200 text-sm leading-relaxed">
                    Partner terbaik untuk mewujudkan setiap detik momen berharga Anda. Professional, Creative, & Memorable.
                </p>
            </div>

            {{-- Kolom 2: Services --}}
            <div>
                <h4 class="text-lg font-bold mb-6 text-white">Services</h4>
                <ul class="space-y-4 text-blue-200 text-sm">
                    <li><a href="#" class="hover:text-[#F7941D] transition-colors">Wedding Planning</a></li>
                    <li><a href="#" class="hover:text-[#F7941D] transition-colors">Corporate Events</a></li>
                    <li><a href="#" class="hover:text-[#F7941D] transition-colors">Birthday Party</a></li>
                    <li><a href="#" class="hover:text-[#F7941D] transition-colors">Music Festival</a></li>
                </ul>
            </div>

            {{-- Kolom 3: Company --}}
            <div>
                <h4 class="text-lg font-bold mb-6 text-white">Company</h4>
                <ul class="space-y-4 text-blue-200 text-sm">
                    <li><a href="#" class="hover:text-[#F7941D] transition-colors">About Us</a></li>
                    <li><a href="#" class="hover:text-[#F7941D] transition-colors">Our Team</a></li>
                    <li><a href="#" class="hover:text-[#F7941D] transition-colors">Careers</a></li>
                    <li><a href="#" class="hover:text-[#F7941D] transition-colors">Contact</a></li>
                </ul>
            </div>

            {{-- Kolom 4: Connect --}}
            <div>
                <h4 class="text-lg font-bold mb-6 text-white">Connect</h4>
                <ul class="space-y-4 text-blue-200 text-sm">
                    <li><a href="#" class="hover:text-[#F7941D] transition-colors">Instagram</a></li>
                    <li><a href="#" class="hover:text-[#F7941D] transition-colors">TikTok</a></li>
                    <li><a href="#" class="hover:text-[#F7941D] transition-colors">LinkedIn</a></li>
                    <li><a href="#" class="hover:text-[#F7941D] transition-colors">WhatsApp</a></li>
                </ul>
            </div>
        </div>

        {{-- Bottom: Copyright & Marco --}}
        <div class="border-t border-blue-800/50 pt-8 text-center">
            <p class="text-blue-300 text-sm">
                &copy; 2026 Stukka Events. All rights reserved. Dibuat oleh Marco.
            </p>
        </div>
    </div>
</footer>