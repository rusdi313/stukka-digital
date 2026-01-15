@extends('layouts.admin')

@section('content')
<div class="max-w-4xl mx-auto px-4 py-10">
    <h2 class="text-2xl font-bold mb-6">Edit Project: {{ $event->title }}</h2>

    <div class="bg-white p-6 rounded-xl shadow">
        <form action="{{ route('admin.events.update', $event->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT') {{-- PENTING UNTUK UPDATE --}}
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-4">
                <div>
                    <label class="block mb-2 font-bold">Judul Project</label>
                    <input type="text" name="title" value="{{ $event->title }}" class="w-full border rounded p-2" required>
                </div>
                <div>
                    <label class="block mb-2 font-bold">Lokasi</label>
                    <input type="text" name="location" value="{{ $event->location }}" class="w-full border rounded p-2" required>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-4">
                <div>
                    <label class="block mb-2 font-bold">Tanggal</label>
                    <input type="text" name="date" value="{{ $event->date }}" class="w-full border rounded p-2" required>
                </div>
                <div>
                    <label class="block mb-2 font-bold">Status</label>
                    <select name="status" class="w-full border rounded p-2">
                        <option value="upcoming" {{ $event->status == 'upcoming' ? 'selected' : '' }}>Persiapan</option>
                        <option value="ongoing" {{ $event->status == 'ongoing' ? 'selected' : '' }}>Sedang Berjalan</option>
                        <option value="finished" {{ $event->status == 'finished' ? 'selected' : '' }}>Selesai</option>
                    </select>
                </div>
            </div>

            <div class="mb-4">
                <label class="block mb-2 font-bold">Ganti Gambar (Opsional)</label>
                <input type="file" name="image" class="w-full border rounded p-2">
                <p class="text-xs text-gray-500 mt-1">Biarkan kosong jika tidak ingin mengganti gambar.</p>
                <img src="{{ $event->image }}" class="w-32 mt-2 rounded">
            </div>

            <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700 font-bold">Update Project</button>
        </form>
    </div>
</div>
@endsection