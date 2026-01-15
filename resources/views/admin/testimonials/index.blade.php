@extends('layouts.admin')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
    
    {{-- Header --}}
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-[#001D5E]">Kelola Testimoni Client</h2>
        <a href="{{ route('admin.events.index') }}" class="text-gray-500 hover:text-[#001D5E] font-bold flex items-center gap-2">
            <i data-lucide="arrow-left" class="w-4 h-4"></i> Kembali ke Project
        </a>
    </div>

    {{-- Notifikasi Sukses --}}
    @if(session('success'))
        <div class="bg-green-100 border border-green-200 text-green-700 px-4 py-3 rounded-xl mb-6 flex items-center gap-2">
            <i data-lucide="check-circle" class="w-5 h-5"></i>
            {{ session('success') }}
        </div>
    @endif

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        
        {{-- BAGIAN 1: FORM TAMBAH TESTIMONI (Sebelah Kiri / Atas) --}}
        <div class="lg:col-span-1">
            <div class="bg-white p-6 rounded-2xl shadow-lg border border-gray-100 sticky top-24">
                <h3 class="font-bold text-lg text-gray-800 mb-4 flex items-center gap-2">
                    <i data-lucide="message-square-plus" class="w-5 h-5 text-[#F7941D]"></i>
                    Tambah Testimoni
                </h3>
                
                <form action="{{ route('admin.testimonials.store') }}" method="POST">
                    @csrf
                    
                    {{-- Nama --}}
                    <div class="mb-4">
                        <label class="block text-sm font-bold text-gray-700 mb-1">Nama Client</label>
                        <input type="text" name="name" class="w-full border-gray-300 rounded-lg focus:ring-[#001D5E] focus:border-[#001D5E]" placeholder="Contoh: Budi Santoso" required>
                    </div>

                    {{-- Jabatan / Role --}}
                    <div class="mb-4">
                        <label class="block text-sm font-bold text-gray-700 mb-1">Jabatan (Opsional)</label>
                        <input type="text" name="role" class="w-full border-gray-300 rounded-lg focus:ring-[#001D5E] focus:border-[#001D5E]" placeholder="CEO, PT Maju Mundur">
                    </div>

                    {{-- Rating Bintang --}}
                    <div class="mb-4">
                        <label class="block text-sm font-bold text-gray-700 mb-1">Rating Bintang</label>
                        <select name="stars" class="w-full border-gray-300 rounded-lg focus:ring-[#001D5E] focus:border-[#001D5E]">
                            <option value="5">⭐⭐⭐⭐⭐ (5 - Sempurna)</option>
                            <option value="4">⭐⭐⭐⭐ (4 - Bagus)</option>
                            <option value="3">⭐⭐⭐ (3 - Oke)</option>
                            <option value="2">⭐⭐ (2 - Kurang)</option>
                            <option value="1">⭐ (1 - Buruk)</option>
                        </select>
                    </div>

                    {{-- Isi Testimoni --}}
                    <div class="mb-6">
                        <label class="block text-sm font-bold text-gray-700 mb-1">Kata Mereka</label>
                        <textarea name="content" rows="4" class="w-full border-gray-300 rounded-lg focus:ring-[#001D5E] focus:border-[#001D5E]" placeholder="Tulis pengalaman klien di sini..." required></textarea>
                    </div>

                    <button type="submit" class="w-full bg-[#001D5E] hover:bg-blue-900 text-white font-bold py-3 rounded-lg transition-colors flex justify-center gap-2">
                        <i data-lucide="save" class="w-4 h-4"></i> Simpan
                    </button>
                </form>
            </div>
        </div>

        {{-- BAGIAN 2: DAFTAR TESTIMONI (Sebelah Kanan / Bawah) --}}
        <div class="lg:col-span-2">
            <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
                <div class="p-6 border-b border-gray-100 bg-gray-50">
                    <h3 class="font-bold text-gray-800">Daftar Testimoni ({{ $testimonials->count() }})</h3>
                </div>

                @if($testimonials->count() > 0)
                    <div class="divide-y divide-gray-100">
                        @foreach($testimonials as $testi)
                        <div class="p-6 hover:bg-gray-50 transition-colors group">
                            <div class="flex justify-between items-start">
                                <div>
                                    <div class="flex items-center gap-2 mb-1">
                                        <h4 class="font-bold text-[#001D5E] text-lg">{{ $testi->name }}</h4>
                                        <span class="text-xs bg-blue-100 text-blue-800 px-2 py-0.5 rounded-full font-bold">{{ $testi->role ?? 'Client' }}</span>
                                    </div>
                                    
                                    {{-- Tampilan Bintang --}}
                                    <div class="flex text-yellow-400 mb-2">
                                        @for($i=0; $i < $testi->stars; $i++)
                                            <i data-lucide="star" class="w-4 h-4 fill-current"></i>
                                        @endfor
                                    </div>

                                    <p class="text-gray-600 text-sm italic">"{{ $testi->content }}"</p>
                                    <p class="text-xs text-gray-400 mt-2">Dibuat: {{ $testi->created_at->format('d M Y') }}</p>
                                </div>

                                {{-- Tombol Hapus --}}
                                <form action="{{ route('admin.testimonials.destroy', $testi->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus testimoni dari {{ $testi->name }}?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-gray-400 hover:text-red-600 transition-colors p-2 rounded-full hover:bg-red-50" title="Hapus">
                                        <i data-lucide="trash-2" class="w-5 h-5"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                        @endforeach
                    </div>
                @else
                    <div class="p-10 text-center text-gray-500">
                        <i data-lucide="message-square-off" class="w-12 h-12 mx-auto mb-3 text-gray-300"></i>
                        <p>Belum ada testimoni yang ditambahkan.</p>
                    </div>
                @endif
            </div>
        </div>

    </div>
</div>
@endsection