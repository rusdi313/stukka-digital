<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking; // Pastikan Model Booking dipanggil
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    // =========================================================================
    // 1. HALAMAN SERVICES (CEK KETERSEDIAAN) - [INI YANG HILANG SEBELUMNYA]
    // =========================================================================
    public function services()
    {
        // Ambil semua tanggal yang statusnya 'approved' dari database.
        // Tujuannya agar Flatpickr bisa mematikan (disable) tanggal ini di kalender.
        $bookedDates = Booking::where('status', 'approved')
                        ->pluck('event_date') // Mengambil kolom event_date saja
                        ->toArray();

        // Kirim data tanggal tersebut ke view pages.services
        return view('pages.services', compact('bookedDates'));
    }

    // =========================================================================
    // 2. TAMPILKAN FORMULIR (Menangkap tanggal dari halaman services)
    // =========================================================================
    public function create(Request $request)
    {
        // Ambil tanggal dari parameter URL (?date=...)
        $date = $request->date;
        
        // Jika user mencoba akses langsung /booking/form tanpa pilih tanggal, kembalikan ke services
        if(!$date) {
            return redirect()->route('services')->with('error', 'Silakan pilih tanggal terlebih dahulu.');
        }
        
        return view('pages.booking_form', compact('date'));
    }

    // =========================================================================
    // 3. SIMPAN KE DATABASE (Proses Submit Form)
    // =========================================================================
    public function store(Request $request)
    {
        // Validasi input user
        $request->validate([
            'name' => 'required|string|max:255',
            'whatsapp_number' => 'required|numeric',
            'email' => 'required|email',
            'event_type' => 'required',
            // Validasi Khusus: Cek agar tidak double book di tanggal yg SUDAH APPROVED
            // Artinya: Kalau statusnya masih 'pending' atau 'rejected', tanggal itu masih boleh dipesan orang lain.
            'event_date' => 'required|date|unique:bookings,event_date,NULL,id,status,approved', 
            'guest_estimate' => 'required',
            'budget_estimate' => 'required',
        ]);

        // Simpan Data (Sesuai kolom di Model & Database kamu)
        Booking::create([
            'user_id' => Auth::id(), // ID User yang sedang login
            'name' => $request->name,
            'whatsapp_number' => $request->whatsapp_number,
            'email' => $request->email,
            'event_type' => $request->event_type,
            'event_date' => $request->event_date,
            'guest_estimate' => $request->guest_estimate,
            'budget_estimate' => $request->budget_estimate,
            'notes' => $request->notes,
            'status' => 'pending', // Default status menunggu approval admin
        ]);

        // Redirect ke dashboard user dengan pesan sukses
        return redirect()->route('user.dashboard')->with('success', 'Booking berhasil dikirim! Tim kami akan segera meninjau pesanan Anda.');
    }

    // =========================================================================
    // 4. DASHBOARD USER (Cek Status Booking Saya)
    // =========================================================================
    public function dashboard()
    {
        // Tampilkan booking milik user yang sedang login saja, urutkan dari yang terbaru
        $myBookings = Booking::where('user_id', Auth::id())->latest()->get();
        
        return view('pages.user_dashboard', compact('myBookings'));
    }
}