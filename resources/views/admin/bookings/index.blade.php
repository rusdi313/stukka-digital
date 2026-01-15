@extends('layouts.admin') {{-- Sesuaikan dengan layout admin kamu --}}

@section('content')

<div class="p-6">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-[#001D5E]">Kelola Booking Masuk</h2>
    </div>

    {{-- TABEL DATA --}}
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <table class="w-full text-left border-collapse">
            <thead class="bg-gray-50 text-gray-600 uppercase text-xs font-bold">
                <tr>
                    <th class="p-4">Klien</th>
                    <th class="p-4">Event</th>
                    <th class="p-4">Tanggal</th>
                    <th class="p-4">Status</th>
                    <th class="p-4 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @foreach($bookings as $booking)
                <tr class="hover:bg-gray-50 transition-colors">
                    
                    {{-- Kolom Klien --}}
                    <td class="p-4">
                        <p class="font-bold text-[#001D5E]">{{ $booking->name }}</p>
                        <p class="text-xs text-gray-500">{{ $booking->email }}</p>
                        <p class="text-xs text-gray-500">{{ $booking->whatsapp_number }}</p>
                    </td>

                    {{-- Kolom Event --}}
                    <td class="p-4">
                        <span class="bg-blue-100 text-blue-700 py-1 px-3 rounded-full text-xs font-bold">
                            {{ $booking->event_type }}
                        </span>
                    </td>

                    {{-- Kolom Tanggal --}}
                    <td class="p-4 text-sm text-gray-600">
                        {{ \Carbon\Carbon::parse($booking->event_date)->format('d M Y') }}
                    </td>

                    {{-- Kolom Status --}}
                    <td class="p-4">
                        @if($booking->status == 'pending')
                            <span class="text-yellow-600 bg-yellow-100 px-2 py-1 rounded text-xs font-bold">Menunggu</span>
                        @elseif($booking->status == 'approved')
                            <span class="text-green-600 bg-green-100 px-2 py-1 rounded text-xs font-bold">Disetujui</span>
                        @else
                            <span class="text-red-600 bg-red-100 px-2 py-1 rounded text-xs font-bold">Ditolak</span>
                        @endif
                    </td>

                    {{-- Kolom Aksi (Tombol Detail) --}}
                    <td class="p-4 text-center">
                        <button onclick="openModal(this)" 
                            data-id="{{ $booking->id }}"
                            data-name="{{ $booking->name }}"
                            data-wa="{{ $booking->whatsapp_number }}"
                            data-email="{{ $booking->email }}"
                            data-event="{{ $booking->event_type }}"
                            data-date="{{ $booking->event_date }}"
                            data-guest="{{ $booking->guest_estimate }}"
                            data-budget="{{ $booking->budget_estimate }}"
                            data-notes="{{ $booking->notes }}"
                            data-admin-notes="{{ $booking->admin_notes }}"
                            data-status="{{ $booking->status }}"
                            class="bg-[#001D5E] text-white px-4 py-2 rounded-lg text-sm hover:bg-blue-900 transition shadow-md flex items-center gap-2 mx-auto">
                            <i data-lucide="eye" class="w-4 h-4"></i> Lihat Detail & Aksi
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        
        {{-- Jika Data Kosong --}}
        @if($bookings->isEmpty())
            <div class="p-8 text-center text-gray-400">Belum ada data booking masuk.</div>
        @endif
    </div>
</div>

{{-- ========================================== --}}
{{-- MODAL POP-UP (Hidden by default) --}}
{{-- ========================================== --}}
<div id="bookingModal" class="fixed inset-0 z-50 hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    
    {{-- Overlay Gelap (Backdrop) --}}
    <div class="fixed inset-0 bg-gray-900 bg-opacity-75 transition-opacity" onclick="closeModal()"></div>

    {{-- Modal Panel --}}
    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
            
            <div class="relative transform overflow-hidden rounded-2xl bg-white text-left shadow-2xl transition-all sm:my-8 sm:w-full sm:max-w-2xl">
                
                {{-- Header Modal --}}
                <div class="bg-[#001D5E] px-6 py-4 flex justify-between items-center">
                    <h3 class="text-lg font-bold text-white" id="modal-title">Detail Pesanan Booking</h3>
                    <button onclick="closeModal()" class="text-white hover:text-gray-200">
                        <i data-lucide="x" class="w-6 h-6"></i>
                    </button>
                </div>

                {{-- Body Modal --}}
                <div class="px-6 py-6">
                    
                    {{-- Grid Informasi --}}
                    <div class="grid grid-cols-2 gap-6 mb-6">
                        <div>
                            <label class="text-xs text-gray-400 uppercase font-bold block mb-1">Nama Klien</label>
                            <p id="modal_name" class="font-bold text-gray-800 text-lg">-</p>
                        </div>
                        <div>
                            <label class="text-xs text-gray-400 uppercase font-bold block mb-1">Kontak</label>
                            <p id="modal_wa" class="text-sm text-gray-600 font-medium">-</p>
                            <p id="modal_email" class="text-sm text-gray-500">-</p>
                        </div>
                        <div>
                            <label class="text-xs text-gray-400 uppercase font-bold block mb-1">Jenis Acara</label>
                            <span id="modal_event" class="bg-blue-100 text-blue-800 px-2 py-1 rounded text-sm font-bold">-</span>
                        </div>
                        <div>
                            <label class="text-xs text-gray-400 uppercase font-bold block mb-1">Tanggal Acara</label>
                            <p id="modal_date" class="font-bold text-gray-800">-</p>
                        </div>
                        <div>
                            <label class="text-xs text-gray-400 uppercase font-bold block mb-1">Estimasi Tamu</label>
                            <p id="modal_guest" class="text-gray-700">- Orang</p>
                        </div>
                        <div>
                            <label class="text-xs text-gray-400 uppercase font-bold block mb-1">Estimasi Budget</label>
                            <p id="modal_budget" class="text-gray-700">-</p>
                        </div>
                    </div>

                    {{-- Full Notes (Ini yang dulu kepotong) --}}
                    <div class="bg-gray-50 p-4 rounded-xl border border-gray-100 mb-6">
                        <label class="text-xs text-gray-400 uppercase font-bold block mb-2 flex items-center gap-1">
                            <i data-lucide="message-square" class="w-3 h-3"></i> Catatan Klien
                        </label>
                        <p id="modal_notes" class="text-gray-600 italic text-sm leading-relaxed">
                            "Tidak ada catatan."
                        </p>
                    </div>

                    {{-- FORM PROSES (Approve/Reject + Balasan) --}}
                    <form id="updateForm" method="POST" action="">
                        @csrf
                        @method('PUT')
                        
                        {{-- Input Balasan Admin --}}
                        <div class="mb-6">
                            <label class="block text-sm font-bold text-gray-700 mb-2">Balasan / Catatan Admin (Opsional)</label>
                            <textarea name="admin_notes" id="modal_admin_notes" rows="3" 
                                class="w-full rounded-lg border-gray-300 shadow-sm focus:border-[#001D5E] focus:ring focus:ring-blue-200 transition"
                                placeholder="Tulis alasan penolakan atau info tambahan untuk klien..."></textarea>
                        </div>

                        {{-- Action Buttons --}}
                        <div class="flex gap-3 pt-4 border-t border-gray-100">
                            {{-- Tombol Reject --}}
                            <button type="submit" name="status" value="rejected" 
                                class="flex-1 px-4 py-3 bg-white border-2 border-red-500 text-red-500 font-bold rounded-xl hover:bg-red-50 transition flex justify-center items-center gap-2">
                                <i data-lucide="x-circle" class="w-5 h-5"></i> Tolak Booking
                            </button>
                            
                            {{-- Tombol Approve --}}
                            <button type="submit" name="status" value="approved" 
                                class="flex-1 px-4 py-3 bg-[#001D5E] text-white font-bold rounded-xl hover:bg-blue-900 transition shadow-lg flex justify-center items-center gap-2">
                                <i data-lucide="check-circle" class="w-5 h-5"></i> Setujui (Approve)
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

{{-- JAVASCRIPT UNTUK MODAL --}}
<script>
    function openModal(button) {
        // 1. Ambil data dari tombol yang diklik
        const id = button.getAttribute('data-id');
        const name = button.getAttribute('data-name');
        const wa = button.getAttribute('data-wa');
        const email = button.getAttribute('data-email');
        const event = button.getAttribute('data-event');
        const date = button.getAttribute('data-date');
        const guest = button.getAttribute('data-guest');
        const budget = button.getAttribute('data-budget');
        const notes = button.getAttribute('data-notes');
        const adminNotes = button.getAttribute('data-admin-notes');
        
        // 2. Isi data ke dalam Modal HTML
        document.getElementById('modal_name').textContent = name;
        document.getElementById('modal_wa').textContent = wa;
        document.getElementById('modal_email').textContent = email;
        document.getElementById('modal_event').textContent = event;
        document.getElementById('modal_date').textContent = date;
        document.getElementById('modal_guest').textContent = guest;
        document.getElementById('modal_budget').textContent = budget;
        document.getElementById('modal_notes').textContent = notes ? notes : "Tidak ada catatan.";
        document.getElementById('modal_admin_notes').value = adminNotes ? adminNotes : "";

        // 3. Update URL Form Action agar sesuai ID Booking
        // Pastikan route kamu bernama 'admin.bookings.update'
        const form = document.getElementById('updateForm');
        form.action = "/admin/bookings/" + id; 

        // 4. Tampilkan Modal
        document.getElementById('bookingModal').classList.remove('hidden');
    }

    function closeModal() {
        document.getElementById('bookingModal').classList.add('hidden');
    }
</script>

@endsection