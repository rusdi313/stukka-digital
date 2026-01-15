@extends('layouts.admin')

@section('content')
<div class="max-w-5xl mx-auto px-4 py-10">
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-3xl font-black text-[#001D5E]">Tambah Project Baru</h2>
        <a href="{{ route('admin.events.index') }}" class="text-gray-500 hover:text-[#001D5E] font-bold">
            &larr; Kembali
        </a>
    </div>

    <div class="bg-white p-8 rounded-2xl shadow-xl border border-gray-100">
        <form action="{{ route('admin.events.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            {{-- Baris 1: Judul & Klien --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div>
                    <label class="block mb-2 font-bold text-gray-700">Nama Event / Project</label>
                    <input type="text" name="title" class="w-full border-gray-300 rounded-xl shadow-sm focus:border-[#001D5E] focus:ring focus:ring-blue-200 transition" placeholder="Contoh: Konser Kemerdekaan" required>
                </div>
                <div>
                    <label class="block mb-2 font-bold text-gray-700">Kolaborasi Dengan (Klien)</label>
                    <input type="text" name="client_name" class="w-full border-gray-300 rounded-xl shadow-sm focus:border-[#001D5E] focus:ring focus:ring-blue-200 transition" placeholder="Contoh: PT. Pertamina, BUMN, dll" required>
                </div>
            </div>

            {{-- Baris 2: Lokasi, Tanggal, Status --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                <div>
                    <label class="block mb-2 font-bold text-gray-700">Lokasi Event</label>
                    <input type="text" name="location" class="w-full border-gray-300 rounded-xl shadow-sm" required>
                </div>
                <div>
                    <label class="block mb-2 font-bold text-gray-700">Tanggal Pelaksanaan</label>
                    <input type="text" name="date" class="w-full border-gray-300 rounded-xl shadow-sm" placeholder="Contoh: 20 Agustus 2024" required>
                </div>
                <div>
                    <label class="block mb-2 font-bold text-gray-700">Status Project</label>
                    <select name="status" class="w-full border-gray-300 rounded-xl shadow-sm">
                        <option value="upcoming">Persiapan (Upcoming)</option>
                        <option value="ongoing">Sedang Berjalan</option>
                        <option value="finished">Selesai</option>
                    </select>
                </div>
            </div>

            {{-- Baris 3: Upload Gambar --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                <div>
                    <label class="block mb-2 font-bold text-gray-700">Cover Utama (Poster/Banner)</label>
                    <input type="file" name="image" class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-[#001D5E] hover:file:bg-blue-100" required>
                    <p class="text-xs text-gray-400 mt-1">Gambar yang muncul di halaman depan.</p>
                </div>
            <div class="mb-8">
                <label class="block mb-2 font-bold text-gray-700">Foto Dokumentasi Lapangan (Maks 3)</label>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    
                    {{-- Slot 1 --}}
                    <div class="border-2 border-dashed border-gray-300 rounded-xl p-4 text-center hover:bg-gray-50 transition">
                        <i data-lucide="image" class="w-8 h-8 text-gray-400 mx-auto mb-2"></i>
                        <span class="text-xs font-bold text-gray-500 block mb-2">Foto 1</span>
                        <input type="file" name="doc1" class="w-full text-xs text-gray-500">
                    </div>

                    {{-- Slot 2 --}}
                    <div class="border-2 border-dashed border-gray-300 rounded-xl p-4 text-center hover:bg-gray-50 transition">
                        <i data-lucide="image" class="w-8 h-8 text-gray-400 mx-auto mb-2"></i>
                        <span class="text-xs font-bold text-gray-500 block mb-2">Foto 2</span>
                        <input type="file" name="doc2" class="w-full text-xs text-gray-500">
                    </div>

                    {{-- Slot 3 --}}
                    <div class="border-2 border-dashed border-gray-300 rounded-xl p-4 text-center hover:bg-gray-50 transition">
                        <i data-lucide="image" class="w-8 h-8 text-gray-400 mx-auto mb-2"></i>
                        <span class="text-xs font-bold text-gray-500 block mb-2">Foto 3</span>
                        <input type="file" name="doc3" class="w-full text-xs text-gray-500">
                    </div>

                </div>
            </div>
            </div>

            <div class="mb-6 p-4 bg-yellow-50 border border-yellow-200 rounded-xl flex items-center gap-3">
                <input type="checkbox" name="is_featured" value="1" id="feat" class="w-5 h-5 text-[#001D5E] rounded">
                <label for="feat" class="font-bold text-gray-700">Tampilkan di Halaman Depan (Featured)?</label>
            </div>

            <div class="flex justify-end">
                <button type="submit" class="bg-[#001D5E] hover:bg-blue-900 text-white px-8 py-3 rounded-xl font-bold shadow-lg transition-transform active:scale-95">
                    Simpan Project
                </button>
            </div>
        </form>
    </div>
</div>
@endsection