@extends('layouts.admin') {{-- Pastikan layout ini ada (bawaan Breeze/Jetstream) --}}

@section('content')
<div class="max-w-7xl mx-auto px-4 py-10">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Kelola Portofolio</h2>
        <a href="{{ route('admin.events.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
            + Tambah Project
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-4 rounded-lg mb-4">{{ session('success') }}</div>
    @endif

    <div class="bg-white rounded-xl shadow overflow-hidden">
        <table class="w-full text-left">
            <thead class="bg-gray-50 border-b">
                <tr>
                    <th class="p-4">Gambar</th>
                    <th class="p-4">Judul Project</th>
                    <th class="p-4">Tanggal</th>
                    <th class="p-4">Status</th>
                    <th class="p-4">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y">
                @foreach($events as $event)
                <tr class="hover:bg-gray-50">
                    <td class="p-4">
                        <img src="{{ $event->image }}" class="w-16 h-10 object-cover rounded">
                    </td>
                    <td class="p-4 font-bold">{{ $event->title }}</td>
                    <td class="p-4">{{ $event->date }}</td>
                    <td class="p-4">
                        <span class="px-2 py-1 rounded text-xs font-bold 
                            {{ $event->status == 'upcoming' ? 'bg-blue-100 text-blue-700' : 'bg-gray-100 text-gray-700' }}">
                            {{ $event->status }}
                        </span>
                    </td>
                    <td class="p-4 flex gap-2">
                        <a href="{{ route('admin.events.edit', $event->id) }}" class="text-blue-600 hover:underline">Edit</a>
                        <form action="{{ route('admin.events.destroy', $event->id) }}" method="POST" onsubmit="return confirm('Yakin hapus?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="mt-4">{{ $events->links() }}</div>
</div>
@endsection