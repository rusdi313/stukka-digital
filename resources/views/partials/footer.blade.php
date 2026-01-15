<footer class="bg-[#001D5E] text-blue-200 py-16 border-t border-blue-900">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-12">
            <div class="col-span-1 md:col-span-1">
                 <a href="{{ route('home') }}" class="flex items-center gap-2 mb-6 cursor-pointer">
                   <div class="w-8 h-8 bg-[#F7941D] rounded-lg flex items-center justify-center font-bold text-xl text-white">S</div>
                   <span class="font-semibold text-xl text-white tracking-tight">Stukka Events</span>
               </a>
               <p class="text-sm leading-relaxed text-blue-300">
                Partner terbaik untuk mewujudkan setiap detik momen berharga Anda. Professional, Creative, & Memorable.
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
          &copy; {{ date('Y') }} Stukka Events. All rights reserved. Dibuat oleh AI.
        </div>
      </div>
</footer>