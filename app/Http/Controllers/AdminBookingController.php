<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;

class AdminBookingController extends Controller
{
    // 1. Menampilkan Daftar Booking
    public function index()
    {
        $bookings = Booking::latest()->get();
        return view('admin.bookings.index', compact('bookings'));
    }

    // ==========================================
    // BAGIAN INI YANG DIPERBAIKI
    // ==========================================
    // Ubah dari 'update' menjadi 'updateStatus' agar sesuai dengan Route kamu
    public function updateStatus(Request $request, $id) 
    {
        // Cari data booking berdasarkan ID
        $booking = Booking::findOrFail($id);

        // Validasi input
        $request->validate([
            'status' => 'required|in:approved,rejected', 
            'admin_notes' => 'nullable|string',          
        ]);

        // Simpan Perubahan
        $booking->status = $request->status;
        $booking->admin_notes = $request->admin_notes; 
        $booking->save();

        // Redirect kembali dengan pesan sukses
        return redirect()->back()->with('success', 'Status booking dan catatan berhasil diperbarui!');
    }
}