@extends('layouts.app')

@section('content')

    {{-- Setup Data Statis (Updated Sesuai Dokumen Word) --}}
    @php
        // Kategori Layanan Baru
        $categories = [
            ['name' => 'Brand/Event Mgmt', 'icon' => 'calendar-check', 'color' => 'bg-[#F7941D]'], 
            ['name' => 'Visual & Creative', 'icon' => 'palette', 'color' => 'bg-blue-500'], 
            ['name' => 'App Digital Mgmt', 'icon' => 'smartphone', 'color' => 'bg-green-500'], 
            ['name' => 'Production Mgmt', 'icon' => 'settings-2', 'color' => 'bg-purple-500'], 
            ['name' => 'Sponsorship', 'icon' => 'handshake', 'color' => 'bg-red-500'], 
        ];
        
        // Benefit (Why Us)
        $benefits = [
            "Vendor Terpercaya & Terkurasi", 
            "Konsep Kreatif & Out of The Box", 
            "Dokumentasi Cinematic Profesional",
            "Manajemen Tamu VIP & VVIP", 
            "Laporan Budget Transparan", 
            "Tim Berpengalaman >10 Tahun"
        ];

        $videoId = "BOG_CbEDhag";
    @endphp

    {{-- CSS Khusus Animasi Marquee --}}
    <style>
        @keyframes scrollRight {
            0% { transform: translateX(-50%); }
            100% { transform: translateX(0); }
        }
        @keyframes scrollLeft {
            0% { transform: translateX(0); }
            100% { transform: translateX(-50%); }
        }
        .animate-scroll-right { 
            animation: scrollRight 40s linear infinite; 
            width: max-content;
        }
        .animate-scroll-left { 
            animation: scrollLeft 40s linear infinite;
            width: max-content;
        }
        .animate-scroll-left:hover, .animate-scroll-right:hover {
            animation-play-state: paused;
        }
    </style>

    {{-- 1. HERO SECTION --}}
    <div class="relative w-full h-screen overflow-hidden flex items-center justify-center bg-black">
        <div class="absolute top-0 left-0 w-full h-full z-0 pointer-events-none overflow-hidden">
            <iframe src="https://www.youtube.com/embed/{{ $videoId }}?autoplay=1&mute=1&controls=0&loop=1&playlist={{ $videoId }}&showinfo=0&rel=0&iv_load_policy=3&modestbranding=1&playsinline=1" class="absolute top-1/2 left-1/2 w-[300%] h-[300%] -translate-x-1/2 -translate-y-1/2 object-cover opacity-80" frameborder="0" allowfullscreen></iframe>
        </div>
        <div class="absolute inset-0 bg-black/50 z-10 bg-gradient-to-b from-black/30 via-transparent to-[#001D5E]"></div>

        <div class="relative z-20 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center mt-10">
            <span class="inline-block py-1 px-4 rounded-full bg-[#F7941D]/90 text-white text-sm font-bold tracking-widest uppercase mb-6 backdrop-blur-sm shadow-lg animate-fade-in-up">STUKKA EVENTS</span>
            <h1 class="text-5xl md:text-7xl lg:text-8xl font-extrabold text-white mb-6 leading-tight drop-shadow-2xl tracking-tight">
                Creative work, <br class="hidden sm:inline" /> <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#F7941D] to-yellow-300">reimagined</span>
            </h1>
            <p class="mt-6 text-lg md:text-2xl font-light text-gray-200 max-w-3xl mx-auto drop-shadow-md leading-relaxed">
                Menciptakan pengalaman luar biasa melalui keberanian, presisi, dan inovasi.
            </p>
            <div class="mt-12 flex flex-col sm:flex-row justify-center gap-4">
                
                {{-- LOGIKA BARU: Cek User Type --}}
                @if(Auth::check() && Auth::user()->usertype == 'admin')
                    
                    {{-- HANYA MUNCUL JIKA ADMIN --}}
                    <a href="{{ route('admin.index') }}" 
                       class="inline-flex items-center justify-center px-10 py-4 text-base font-bold rounded-full text-white bg-red-600 hover:bg-red-700 transition-all shadow-lg shadow-red-500/30 transform hover:scale-105">
                        <i data-lucide="layout-dashboard" class="w-5 h-5 mr-2"></i>
                        Masuk ke Panel Admin
                    </a>

                @else
                    
                    {{-- MUNCUL UNTUK USER BIASA (Login) ATAU TAMU (Belum Login) --}}
                    <a href="{{ route('services') }}" 
                       class="inline-flex items-center justify-center px-10 py-4 text-base font-bold rounded-full text-[#001D5E] bg-white hover:bg-gray-100 transition-all shadow-lg">
                        Daftarkan Event <i data-lucide="arrow-right" class="w-5 h-5 ml-2"></i>
                    </a>

                @endif

                {{-- Tombol Portofolio selalu muncul untuk siapa saja --}}
                <a href="{{ route('portfolio') }}" 
                   class="inline-flex items-center justify-center px-10 py-4 text-base font-bold rounded-full text-white border-2 border-white/30 bg-white/10 backdrop-blur-sm hover:bg-white hover:text-[#001D5E] transition-all">
                    Lihat Portofolio
                </a>

            </div>
        </div>
    </div>
    
    {{-- 1.5. VISUAL GRID (Floating Cards) --}}
    <div class="relative z-20 -mt-24 mb-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-[#1f2937] rounded-3xl shadow-2xl border border-gray-700 p-2 transform hover:-translate-y-2 transition-transform duration-300 h-64 overflow-hidden relative group">
                    <img src="https://images.unsplash.com/photo-1533174072545-7a4b6ad7a6c3?q=80&w=1170&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="w-full h-full object-cover rounded-2xl opacity-80 group-hover:opacity-100 transition-opacity" alt="Concert">
                    <div class="absolute bottom-4 left-4 bg-[#F7941D]/90 backdrop-blur-md px-4 py-2 rounded-lg text-white font-bold text-sm">Visual Experience</div>
                </div>
                <div class="bg-[#1f2937] rounded-3xl shadow-2xl border border-[#F7941D] p-2 transform md:-translate-y-8 hover:-translate-y-10 transition-transform duration-300 h-64 md:h-80 overflow-hidden relative group">
                    <img src="https://images.unsplash.com/photo-1595407753234-0882f1e77954?q=80&w=1170&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="w-full h-full object-cover rounded-2xl opacity-90 group-hover:opacity-100 transition-opacity" alt="Wedding">
                    <div class="absolute bottom-4 left-4 bg-[#F7941D]/90 backdrop-blur-md px-4 py-2 rounded-lg text-white font-bold text-sm">Creative Events</div>
                </div>
                <div class="bg-[#1f2937] rounded-3xl shadow-2xl border border-gray-700 p-2 transform hover:-translate-y-2 transition-transform duration-300 h-64 overflow-hidden relative group">
                    <img src="https://images.unsplash.com/photo-1511578314322-379afb476865?q=80&w=1170&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="w-full h-full object-cover rounded-2xl opacity-80 group-hover:opacity-100 transition-opacity" alt="Corporate">
                    <div class="absolute bottom-4 left-4 bg-[#F7941D]/90 backdrop-blur-md px-4 py-2 rounded-lg text-white font-bold text-sm">Production Mgmt</div>
                </div>
            </div>
        </div>
    </div>

    {{-- [NEW] 1.6 ABOUT STUKKA SECTION --}}
    <div class="py-16 bg-white">
        <div class="max-w-4xl mx-auto px-4 text-center">
            <span class="text-[#F7941D] font-bold tracking-widest uppercase text-sm mb-4 block">Our Philosophy</span>
            <h2 class="text-3xl md:text-4xl font-extrabold text-[#001D5E] mb-6">
                Apa itu "Stukka"?
            </h2>
            <div class="prose prose-lg mx-auto text-gray-600 leading-relaxed">
                <p>
                    <strong>Stukka</strong> diambil dari salah satu nama pesawat asal Jerman yang bernama <em>Junkers Ju 87</em> atau <em>Stuka</em>. 
                    Pesawat ini adalah simbol kekuatan yang menciptakan pengalaman luar biasa melalui 
                    <span class="text-[#001D5E] font-bold">keberanian</span>, 
                    <span class="text-[#001D5E] font-bold">presisi</span>, dan 
                    <span class="text-[#001D5E] font-bold">inovasi</span>.
                </p>
                <p class="mt-4">
                    Dengan filosofi tersebut, kami membentuk <strong>Stukka Digital Creative</strong> untuk menghadirkan pendekatan yang berani, 
                    kreatif, dan berfokus pada detail guna menciptakan acara yang menginspirasi.
                </p>
            </div>
        </div>
    </div>

    {{-- 2. CATEGORIES SECTION (Updated Grid) --}}
    <div class="bg-gray-50 py-16"> 
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold text-[#001D5E] mb-12 text-center">Layanan & Spesialisasi</h2>
            {{-- Grid 5 Kolom agar pas --}}
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6">
                @foreach($categories as $cat)
                <div class="bg-white p-6 rounded-2xl shadow-md hover:shadow-xl transition-all duration-300 cursor-pointer border border-gray-100 group hover:-translate-y-1 text-center flex flex-col items-center h-full">
                    <div class="{{ $cat['color'] }} w-14 h-14 rounded-2xl flex items-center justify-center mb-4 group-hover:rotate-6 transition-transform shadow-md">
                        <i data-lucide="{{ $cat['icon'] }}" class="w-7 h-7 text-white"></i>
                    </div>
                    <h3 class="font-bold text-[#001D5E] text-base group-hover:text-[#F7941D] transition-colors">{{ $cat['name'] }}</h3>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    {{-- 3. FEATURED PORTOFOLIO SECTION (From Database) --}}
    <div class="bg-white py-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <span class="text-[#F7941D] font-bold tracking-widest uppercase text-sm mb-2 block">Our Masterpiece</span>
                <h2 class="text-4xl md:text-5xl font-extrabold text-[#001D5E]">Featured Projects</h2>
                <p class="text-gray-500 mt-4 max-w-2xl mx-auto">Kami bangga atas prestasi dan portofolio kami yang mencerminkan dedikasi kami.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach($featuredPortfolios as $item)
                    <div class="bg-white rounded-3xl overflow-hidden shadow-md hover:shadow-2xl transition-all duration-500 group flex flex-col h-full border border-gray-100 relative hover:-translate-y-2">
                        <div class="absolute top-4 left-4 z-10">
                            @if($item->status == 'upcoming')
                                <span class="bg-blue-600 text-white text-[10px] uppercase font-black px-3 py-1.5 rounded-lg shadow-lg">Persiapan</span>
                            @elseif($item->status == 'ongoing')
                                <span class="bg-green-500 text-white text-[10px] uppercase font-black px-3 py-1.5 rounded-lg shadow-lg animate-pulse">Berlangsung</span>
                            @else
                                <span class="bg-gray-800 text-white text-[10px] uppercase font-black px-3 py-1.5 rounded-lg shadow-lg opacity-90">Selesai</span>
                            @endif
                        </div>

                        <a href="{{ route('portfolio.show', $item->id) }}" class="relative h-64 overflow-hidden bg-gray-200 block">
                            <img src="{{ $item->image }}" alt="{{ $item->title }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-60 group-hover:opacity-40 transition-opacity"></div>
                        </a>

                        <div class="p-6 flex flex-col flex-grow">
                            <div class="flex items-center gap-2 mb-3">
                                <i data-lucide="calendar" class="w-4 h-4 text-[#F7941D]"></i>
                                <span class="text-xs font-bold text-gray-500 uppercase tracking-widest">{{ $item->date }}</span>
                            </div>
                            <h3 class="text-xl font-extrabold text-[#001D5E] mb-3 group-hover:text-[#F7941D] transition-colors line-clamp-2">
                                <a href="{{ route('portfolio.show', $item->id) }}">{{ $item->title }}</a>
                            </h3>
                            <div class="mt-auto pt-6 border-t border-gray-100 flex items-center justify-between">
                                <span class="text-xs font-bold text-gray-400 uppercase tracking-wider flex items-center gap-1"><i data-lucide="briefcase" class="w-3 h-3"></i> Project</span>
                                <a href="{{ route('portfolio.show', $item->id) }}" class="text-[#001D5E] font-bold text-sm hover:text-[#F7941D] flex items-center gap-1 transition-colors">Detail <i data-lucide="arrow-right" class="w-4 h-4"></i></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            
            <div class="mt-16 text-center">
                <a href="{{ route('portfolio') }}" class="inline-block px-10 py-4 bg-[#001D5E] rounded-full text-white font-bold hover:bg-blue-900 shadow-xl transition-all transform hover:scale-105">Lihat Seluruh Project</a>
            </div>
        </div>
    </div>

    {{-- 5. CLIENT TRUST --}}
    <div class="bg-[#F9FAFB] py-24 border-y border-gray-200 relative overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-b from-transparent via-white/50 to-transparent pointer-events-none"></div>

        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <span class="text-[#F7941D] font-bold tracking-widest uppercase text-sm mb-3 block">
                    They Trust Us
                </span>
                <h2 class="text-4xl md:text-5xl font-extrabold text-[#001D5E]">
                    Trusted by Great Brands
                </h2>
                <p class="mt-4 text-gray-500">Kolaborasi dengan klien terkemuka untuk acara bersejarah.</p>
            </div>
            
            <div class="relative w-full overflow-hidden" 
                 style="mask-image: linear-gradient(to right, transparent, black 5%, black 95%, transparent); -webkit-mask-image: linear-gradient(to right, transparent, black 5%, black 95%, transparent);">
                
                {{-- BARIS 1 --}}
                <div class="flex mb-12">
                    <div class="flex gap-16 md:gap-24 animate-scroll-left w-max items-center">
                        @for ($i = 0; $i < 12; $i++) 
                            @foreach($clients as $client)
                                <div class="flex-shrink-0 w-32 md:w-48 flex justify-center items-center group">
                                    <img src="{{ $client->logo }}" 
                                         class="h-12 md:h-20 w-auto object-contain hover:scale-110 transition-transform duration-300 cursor-pointer drop-shadow-sm" 
                                         alt="{{ $client->name }}">
                                </div>
                            @endforeach
                        @endfor
                    </div>
                </div>

                {{-- BARIS 2 --}}
                <div class="flex">
                    <div class="flex gap-16 md:gap-24 animate-scroll-right w-max items-center">
                        @for ($i = 0; $i < 12; $i++) 
                            @foreach($clients->reverse() as $client)
                                <div class="flex-shrink-0 w-32 md:w-48 flex justify-center items-center group">
                                    <img src="{{ $client->logo }}" 
                                         class="h-12 md:h-20 w-auto object-contain hover:scale-110 transition-transform duration-300 cursor-pointer drop-shadow-sm" 
                                         alt="{{ $client->name }}">
                                </div>
                            @endforeach
                        @endfor
                    </div>
                </div>

            </div>
        </div>
    </div>

    {{-- 6. TESTIMONIAL SECTION --}}
    <div class="bg-white py-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-4xl mx-auto mb-16">
                <span class="text-[#F7941D] font-bold tracking-widest uppercase text-sm mb-3 block">What Client Says</span>
                <p class="text-gray-600 leading-relaxed text-lg">
                    "Kami ingin mengucapkan terima kasih kepada klien, mitra, dan tim kami yang mendukung kami dalam perjalanan ini."
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-16">
                @foreach($testimonials as $testi)
                <div class="bg-gray-50 p-8 rounded-3xl border border-gray-100 hover:shadow-xl transition-shadow relative group hover:-translate-y-1">
                    <div class="flex gap-1 mb-4">
                        @for($i=0; $i<$testi->stars; $i++)
                            <i data-lucide="star" class="w-5 h-5 text-yellow-400 fill-yellow-400"></i>
                        @endfor
                    </div>
                    <p class="text-gray-700 italic mb-6 leading-relaxed">"{{ $testi->content }}"</p>
                    <div class="flex items-center gap-4 border-t border-gray-200 pt-4">
                        <div class="w-10 h-10 bg-[#001D5E] rounded-full flex items-center justify-center text-white font-bold text-lg">
                            {{ substr($testi->name, 0, 1) }}
                        </div>
                        <div>
                            <h4 class="font-bold text-[#001D5E]">{{ $testi->name }}</h4>
                            <p class="text-xs text-gray-500">{{ $testi->role ?? 'Client' }}</p>
                        </div>
                    </div>
                    <i data-lucide="quote" class="absolute top-6 right-6 w-10 h-10 text-gray-200 fill-gray-200 group-hover:text-blue-100 transition-colors"></i>
                </div>
                @endforeach
            </div>

            <div class="text-center">
                <a href="{{ route('services') }}" class="inline-flex items-center gap-2 bg-[#F7941D] text-white px-10 py-4 rounded-full font-bold shadow-lg shadow-orange-500/30 hover:bg-orange-600 hover:scale-105 transition-all">
                    Get In Touch <i data-lucide="message-circle" class="w-5 h-5"></i>
                </a>
            </div>
        </div>
    </div>

    {{-- 4. BENEFIT / GOALS SECTION --}}
    <div class="bg-[#001D5E] py-24 relative overflow-hidden">
        <div class="absolute top-0 right-0 w-[600px] h-[600px] bg-blue-500/10 rounded-full blur-[120px] pointer-events-none"></div>
        <div class="absolute bottom-0 left-0 w-[400px] h-[400px] bg-orange-500/10 rounded-full blur-[100px] pointer-events-none"></div>

       <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
           <div class="lg:flex lg:items-center lg:gap-20">
               {{-- Kiri: Gambar --}}
               <div class="lg:w-1/2 mb-12 lg:mb-0 relative">
                   <div class="absolute -inset-4 bg-gradient-to-r from-[#F7941D] to-yellow-500 rounded-[2rem] opacity-30 blur-lg"></div>
                   <img 
                       src="https://images.unsplash.com/photo-1511795409834-ef04bbd61622?ixlib=rb-1.2.1&auto=format&fit=crop&w=1000&q=80" 
                       alt="Event Planning Team" 
                       class="rounded-[2rem] shadow-2xl relative z-10 w-full object-cover h-[500px]"
                       onerror="this.onerror=null;this.src='https://placehold.co/1000x500/001D5E/FFFFFF?text=Teamwork';"
                   />
                   
                   <div class="absolute -bottom-10 -right-10 w-40 h-40 bg-[#F7941D] rounded-full flex items-center justify-center border-8 border-[#001D5E] z-20 hidden md:flex animate-pulse">
                       <div class="text-center text-white">
                           <p class="text-3xl font-bold">100%</p>
                           <p class="text-xs uppercase font-bold tracking-wider">Dedicated</p>
                       </div>
                   </div>
               </div>

               {{-- Kanan: Konten Teks (UPDATED TEXT) --}}
               <div class="lg:w-1/2 text-white">
                   <span class="text-[#F7941D] font-bold tracking-widest uppercase text-sm mb-2 block">Our Goals</span>
                   <h2 class="text-3xl md:text-4xl font-bold mb-6 leading-tight">Menciptakan Acara yang <span class="text-[#F7941D]">Menakjubkan</span></h2>
                   
                   <p class="text-blue-200 mb-8 text-lg leading-relaxed">
                       Tujuan kami adalah menghadirkan acara yang menginspirasi dan membangkitkan emosi yang kuat. 
                       Kami menetapkan tujuan untuk menjadi teladan dalam <strong>ketepatan dan presisi</strong>.
                   </p>
                   
                   <div class="grid grid-cols-1 sm:grid-cols-2 gap-y-6 gap-x-8">
                       @foreach($benefits as $benefit)
                       <div class="flex items-center gap-4 group cursor-pointer hover:translate-x-2 transition-transform">
                           <div class="w-10 h-10 rounded-full bg-blue-900 group-hover:bg-[#F7941D] flex items-center justify-center flex-shrink-0 transition-colors shadow-md">
                               <i data-lucide="check-circle" class="w-5 h-5 text-blue-400 group-hover:text-white transition-colors"></i>
                           </div>
                           <span class="text-blue-200 font-medium group-hover:text-white transition-colors">{{ $benefit }}</span>
                       </div>
                       @endforeach
                   </div>
                   
                   <div class="mt-10">
                       <a href="{{ route('services') }}" class="inline-flex bg-white text-[#001D5E] hover:bg-gray-100 px-8 py-3 rounded-full font-bold transition-all items-center gap-2 group shadow-xl transform hover:scale-105">
                           Hubungi Tim Kami <i data-lucide="arrow-right" class="w-5 h-5 group-hover:translate-x-1 transition-transform"></i>
                       </a>
                   </div>
               </div>
           </div>
       </div>
    </div>

@endsection