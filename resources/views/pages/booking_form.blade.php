@extends('layouts.app')

@section('content')
<div class="bg-gray-50 min-h-screen py-16">
    <div class="max-w-3xl mx-auto px-4">
        <div class="bg-white rounded-3xl shadow-xl p-8 border border-gray-100">
            
            <h2 class="text-3xl font-black text-[#001D5E] mb-6 text-center">Lengkapi Data Booking</h2>
            
            <form action="{{ route('booking.store') }}" method="POST">
                @csrf
                
                {{-- Tanggal (Readonly) --}}
                <div class="mb-6 bg-blue-50 p-4 rounded-xl border border-blue-100 text-center">
                    <p class="text-sm text-gray-500 uppercase font-bold tracking-wider">Tanggal Pilihan Anda</p>
                    <p class="text-2xl font-black text-[#F7941D]">{{ date('d F Y', strtotime($date)) }}</p>
                    <input type="hidden" name="event_date" value="{{ $date }}">
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div>
                        <label class="block font-bold text-gray-700 mb-2">Nama Lengkap</label>
                        <input type="text" name="name" class="w-full border-gray-300 rounded-xl" value="{{ Auth::user()->name }}" required>
                    </div>
                    <div>
                        <label class="block font-bold text-gray-700 mb-2">No. WhatsApp</label>
                        <input type="number" name="whatsapp_number" class="w-full border-gray-300 rounded-xl" placeholder="0812..." required>
                    </div>
                </div>

                <div class="mb-6">
                    <label class="block font-bold text-gray-700 mb-2">Alamat Email</label>
                    <input type="email" name="email" class="w-full border-gray-300 rounded-xl" value="{{ Auth::user()->email }}" required>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                    <div>
                        <div class="mb-6">
                            <label class="block text-gray-700 font-bold mb-2">Jenis Layanan / Event</label>
                            <div class="relative">
                                <select name="event_type" class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-[#001D5E] focus:border-[#001D5E] block p-4 appearance-none" required>
                                    <option value="" disabled selected>-- Pilih Layanan Stukka --</option>
                                    
                                    {{-- Opsi Baru Sesuai Dokumen Word --}}
                                    <option value="Brand/Event Management">Brand & Event Management</option>
                                    <option value="Visual & Creative">Visual & Creative Management</option>
                                    <option value="App Digital Management">Application Digital Management</option>
                                    <option value="Production Management">Production Management</option>
                                    <option value="Sponsorship Management">Sponsorship Management</option>
                                    
                                </select>
                                <div class="absolute inset-y-0 right-0 flex items-center px-4 pointer-events-none text-gray-500">
                                    <i data-lucide="chevron-down" class="w-5 h-5"></i>
                                </div>
                            </div>
                        </div>
                    <div>
                        <label class="block font-bold text-gray-700 mb-2">Estimasi Tamu</label>
                        <input type="text" name="guest_estimate" class="w-full border-gray-300 rounded-xl" placeholder="Contoh: 500 Pax">
                    </div>
                    <div>
                        <label class="block font-bold text-gray-700 mb-2">Estimasi Budget</label>
                        <input type="text" name="budget_estimate" class="w-full border-gray-300 rounded-xl" placeholder="Contoh: 100 Juta">
                    </div>
                </div>

                <div class="mb-8">
                    <label class="block font-bold text-gray-700 mb-2">Catatan Tambahan (Opsional)</label>
                    <textarea name="notes" rows="3" class="w-full border-gray-300 rounded-xl" placeholder="Tulis request khusus di sini..."></textarea>
                </div>

                <button type="submit" class="w-full bg-[#001D5E] text-white font-bold py-4 rounded-xl hover:bg-blue-900 transition-all shadow-lg">
                    Kirim Booking Sekarang 🚀
                </button>
            </form>
        </div>
    </div>
</div>
@endsection