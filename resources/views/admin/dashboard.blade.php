@extends('layouts.admin')

@section('title', 'Ringkasan Statistik')

@section('content')
    {{-- Welcome Banner --}}
    <div class="bg-gradient-to-r from-[#001D5E] to-blue-800 rounded-3xl p-8 text-white shadow-xl mb-10 relative overflow-hidden">
        <div class="relative z-10">
            <h1 class="text-3xl font-bold mb-2">Selamat Datang, {{ Auth::user()->name }}! 👋</h1>
            <p class="text-blue-200">Ini adalah pusat kendali website Stukka Events. Kelola semua konten dengan mudah dari sini.</p>
        </div>
        {{-- Hiasan Background --}}
        <i data-lucide="activity" class="absolute right-0 bottom-0 w-64 h-64 text-white opacity-5 -mr-10 -mb-10"></i>
    </div>

    {{-- Stats Grid --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        
        {{-- Stat 1: Projects --}}
        <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex items-center gap-4 hover:shadow-md transition-shadow">
            <div class="w-16 h-16 rounded-xl bg-blue-50 flex items-center justify-center text-[#001D5E]">
                <i data-lucide="briefcase" class="w-8 h-8"></i>
            </div>
            <div>
                <p class="text-sm text-gray-500 font-bold uppercase tracking-wider">Total Project</p>
                <h3 class="text-3xl font-black text-[#001D5E]">{{ $totalProjects }}</h3>
            </div>
        </div>

        {{-- Stat 2: Clients --}}
        <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex items-center gap-4 hover:shadow-md transition-shadow">
            <div class="w-16 h-16 rounded-xl bg-green-50 flex items-center justify-center text-green-600">
                <i data-lucide="building-2" class="w-8 h-8"></i>
            </div>
            <div>
                <p class="text-sm text-gray-500 font-bold uppercase tracking-wider">Logo Client</p>
                <h3 class="text-3xl font-black text-[#001D5E]">{{ $totalClients }}</h3>
            </div>
        </div>

        {{-- Stat 3: Testimonials --}}
        <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex items-center gap-4 hover:shadow-md transition-shadow">
            <div class="w-16 h-16 rounded-xl bg-purple-50 flex items-center justify-center text-purple-600">
                <i data-lucide="message-square-quote" class="w-8 h-8"></i>
            </div>
            <div>
                <p class="text-sm text-gray-500 font-bold uppercase tracking-wider">Testimoni</p>
                <h3 class="text-3xl font-black text-[#001D5E]">{{ $totalTestimonials }}</h3>
            </div>
        </div>

    </div>

    {{-- Quick Action (Opsional) --}}
    <div class="mt-10">
        <h3 class="text-lg font-bold text-[#001D5E] mb-4">Aksi Cepat</h3>
        <div class="flex gap-4">
            <a href="{{ route('admin.events.create') }}" class="flex items-center gap-2 bg-[#F7941D] text-white px-6 py-3 rounded-xl font-bold hover:bg-orange-600 transition-colors shadow-lg shadow-orange-500/20">
                <i data-lucide="plus-circle" class="w-5 h-5"></i> Tambah Project Baru
            </a>
            <a href="{{ route('admin.clients.index') }}" class="flex items-center gap-2 bg-white text-[#001D5E] border border-gray-200 px-6 py-3 rounded-xl font-bold hover:bg-gray-50 transition-colors">
                <i data-lucide="upload-cloud" class="w-5 h-5"></i> Upload Logo
            </a>
        </div>
    </div>
@endsection