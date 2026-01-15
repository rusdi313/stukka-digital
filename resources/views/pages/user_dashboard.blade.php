@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto px-4 py-16 min-h-screen">
    
    <div class="flex items-center justify-between mb-8">
        <h2 class="text-3xl font-black text-[#001D5E]">Riwayat Booking Saya</h2>
        <a href="{{ route('services') }}" class="text-sm font-bold text-blue-600 hover:underline">
            + Booking Baru
        </a>
    </div>

    {{-- Pesan Sukses jika baru submit --}}
    @if(session('success'))
        <div class="bg-green-100 border border-green-200 text-green-700 p-4 rounded-xl mb-6 flex items-center gap-2">
            <i data-lucide="check-circle" class="w-5 h-5"></i>
            {{ session('success') }}
        </div>
    @endif

    <div class="space-y-6">
        @foreach($myBookings as $booking)
            <div class="bg-white p-6 rounded-2xl shadow-lg border border-gray-100 transition hover:shadow-xl">
                
                {{-- Bagian Atas: Info Utama & Badge Status --}}
                <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                    
                    {{-- Detail Event --}}
                    <div>
                        <h4 class="font-bold text-xl text-[#001D5E] mb-1">
                            {{ $booking->event_type }} {{-- Sesuai DB baru --}}
                        </h4>
                        <div class="flex items-center gap-4 text-gray-500 text-sm">
                            <span class="flex items-center gap-1">
                                <i data-lucide="calendar" class="w-4 h-4"></i>
                                {{ \Carbon\Carbon::parse($booking->event_date)->format('d F Y') }} {{-- Sesuai DB baru --}}
                            </span>
                            <span class="flex items-center gap-1">
                                <i data-lucide="users" class="w-4 h-4"></i>
                                Est. {{ $booking->guest_estimate ?? '-' }} Tamu
                            </span>
                        </div>
                    </div>

                    {{-- Badge Status --}}
                    <div>
                        @if($booking->status == 'approved')
                            <div class="flex items-center gap-2 bg-green-100 text-green-700 px-4 py-2 rounded-full font-bold shadow-sm border border-green-200">
                                <i data-lucide="check-circle" class="w-5 h-5"></i> BOOKING DISETUJUI
                            </div>
                        @elseif($booking->status == 'pending')
                            <span class="flex items-center gap-2 bg-yellow-100 text-yellow-700 px-4 py-2 rounded-full font-bold text-sm border border-yellow-200">
                                <i data-lucide="clock" class="w-4 h-4"></i> Menunggu Konfirmasi
                            </span>
                        @else
                            <span class="flex items-center gap-2 bg-red-100 text-red-700 px-4 py-2 rounded-full font-bold text-sm border border-red-200">
                                <i data-lucide="x-circle" class="w-4 h-4"></i> Maaf, Ditolak
                            </span>
                        @endif
                    </div>
                </div>

                {{-- Bagian Bawah: Menampilkan Catatan Admin (Jika Ada) --}}
                @if($booking->admin_notes)
                    
                    {{-- Tampilan Jika DITOLAK (Merah) --}}
                    @if($booking->status == 'rejected')
                        <div class="mt-6 p-4 bg-red-50 border-l-4 border-red-500 rounded-r-lg">
                            <div class="flex items-start gap-3">
                                <i data-lucide="alert-circle" class="w-5 h-5 text-red-600 mt-0.5"></i>
                                <div>
                                    <p class="text-xs font-bold text-red-600 uppercase mb-1">Alasan Penolakan / Catatan:</p>
                                    <p class="text-gray-700 italic">"{{ $booking->admin_notes }}"</p>
                                </div>
                            </div>
                        </div>

                    {{-- Tampilan Jika DISETUJUI (Biru) --}}
                    @elseif($booking->status == 'approved')
                        <div class="mt-6 p-4 bg-blue-50 border-l-4 border-blue-500 rounded-r-lg">
                            <div class="flex items-start gap-3">
                                <i data-lucide="info" class="w-5 h-5 text-blue-600 mt-0.5"></i>
                                <div>
                                    <p class="text-xs font-bold text-blue-600 uppercase mb-1">Pesan dari Admin:</p>
                                    <p class="text-gray-700 italic">"{{ $booking->admin_notes }}"</p>
                                </div>
                            </div>
                        </div>
                    @endif

                @endif

            </div>
        @endforeach

        {{-- Jika Tidak Ada Data --}}
        @if($myBookings->isEmpty())
            <div class="text-center py-12">
                <div class="bg-gray-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4 text-gray-400">
                    <i data-lucide="calendar-off" class="w-8 h-8"></i>
                </div>
                <h3 class="text-lg font-bold text-gray-700">Belum ada riwayat booking.</h3>
                <p class="text-gray-500 mb-6">Yuk, rencanakan event impianmu sekarang!</p>
                <a href="{{ route('services') }}" class="inline-block px-6 py-3 bg-[#001D5E] text-white font-bold rounded-full hover:bg-blue-900 transition shadow-lg">
                    Buat Booking Baru
                </a>
            </div>
        @endif
    </div>
</div>
@endsection