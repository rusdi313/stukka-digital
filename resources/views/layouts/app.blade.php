<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Stukka Events') }}</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
        <script src="https://unpkg.com/lucide@latest"></script>
    </head>
    <body class="font-sans antialiased text-gray-900">
        {{-- UBAH DIV INI: Tambahkan 'flex flex-col' --}}
        <div class="min-h-screen bg-gray-50 flex flex-col">
            
            @include('layouts.navigation')

            {{-- UBAH MAIN: Tambahkan 'flex-grow' --}}
            {{-- flex-grow akan memaksa konten ini memenuhi ruang kosong, mendorong footer ke bawah --}}
            <main class="flex-grow">
                @yield('content')
            </main>
            
<footer class="bg-[#001D5E] text-blue-200 py-16 border-t border-blue-900">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-12">
            <div class="col-span-1 md:col-span-1">
                 <a href="{{ route('home') }}" class="flex items-center gap-2 mb-6 cursor-pointer">
                   <img src="{{ asset('images/Stukka1.png') }}" 
                     alt="Stukka Events" 
                     class="h-12 w-auto object-contain">
               </a>
               <p class="text-sm leading-relaxed text-blue-300">
                PT. Stukka Digital Creative
               </p>
                <p class="text-sm leading-relaxed text-blue-300">
                Jl. Z No.16
               </p>
                <p class="text-sm leading-relaxed text-blue-300">
                Jakarta, Indonesia
               </p>
                <p class="text-sm leading-relaxed text-blue-300">
                +62 878-7810-2822
               </p>
                <p class="text-sm leading-relaxed text-blue-300">
                (WhatsApp)
               </p>
            </div>
            
            <div>
              <h4 class="text-white font-bold mb-6">Services</h4>
              <ul class="space-y-3 text-sm">
                <li><a href="{{ route('services') }}" class="hover:text-[#F7941D] transition-colors">Wedding Planning</a></li>
                <li><a href="{{ route('services') }}" class="hover:text-[#F7941D] transition-colors">Corporate Events</a></li>
                <li><a href="{{ route('services') }}" class="hover:text-[#F7941D] transition-colors">Birthday Party</a></li>
                <li><a href="{{ route('services') }}" class="hover:text-[#F7941D] transition-colors">Music Festival</a></li>
              </ul>
            </div>

            <div>
              <h4 class="text-white font-bold mb-6">Company</h4>
              <ul class="space-y-3 text-sm">
                <li><a href="{{ route('portfolio') }}" class="hover:text-[#F7941D] transition-colors">About Us</a></li>
                <li><a href="{{ route('portfolio') }}" class="hover:text-[#F7941D] transition-colors">Our Team</a></li>
                <li><a href="{{ route('portfolio') }}" class="hover:text-[#F7941D] transition-colors">Careers</a></li>
                <li><a href="{{ route('portfolio') }}" class="hover:text-[#F7941D] transition-colors">Contact</a></li>
              </ul>
            </div>

            <div>
              <h4 class="text-white font-bold mb-6">Connect</h4>
              <ul class="space-y-3 text-sm">
                <li><a href="#" onclick="alert('Simulasi: Instagram')" class="hover:text-[#F7941D] transition-colors">Instagram</a></li>
                <li><a href="#" onclick="alert('Simulasi: TikTok')" class="hover:text-[#F7941D] transition-colors">TikTok</a></li>
                <li><a href="#" onclick="alert('Simulasi: LinkedIn')" class="hover:text-[#F7941D] transition-colors">LinkedIn</a></li>
                <li><a href="#" onclick="alert('Simulasi: WhatsApp')" class="hover:text-[#F7941D] transition-colors">WhatsApp</a></li>
              </ul>
            </div>
        </div>

        <div class="border-t border-blue-900 mt-12 pt-8 text-center text-sm text-blue-400">
          &copy; {{ date('Y') }} Stukka Events. All rights reserved. Dibuat oleh Marco.
        </div>
      </div>
</footer>

        </div>

        <script>
            lucide.createIcons();
        </script>
    </body>
</html>