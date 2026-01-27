<?php

use App\Http\Controllers\AdminBookingController;
use App\Http\Controllers\AdminClientController;
use App\Http\Controllers\AdminEventController;
use App\Http\Controllers\AdminTestimonialController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes (Stukka Events)
|--------------------------------------------------------------------------
*/

// =========================================================================
// 1. HALAMAN PUBLIK (Bisa diakses siapa saja / Tamu)
// =========================================================================

// Halaman Utama (Home)
Route::get('/', function () {
    $featuredEvents = \App\Models\Event::where('is_featured', true)->latest()->take(3)->get();

    if ($featuredEvents->isEmpty()) {
        $featuredEvents = \App\Models\Event::latest()->take(3)->get();
    }

    $clients = \App\Models\Client::all();
    $testimonials = \App\Models\Testimonial::latest()->get();

    return view('pages.home', compact('featuredEvents', 'clients', 'testimonials'));
})->name('home');


// Halaman Portofolio
Route::get('/portfolio', [EventController::class, 'index'])->name('portfolio');
Route::get('/portfolio/{id}', [EventController::class, 'show'])->name('portfolio.show');

// Halaman Services (Cek Kalender Ketersediaan)
// NOTE: Mengarah ke method 'services' untuk load data tanggal yang full
Route::get('/services', [BookingController::class, 'services'])->name('services');


// =========================================================================
// 2. DASHBOARD & PROFILE USER (Harus Login)
// =========================================================================

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // Profile Breeze
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // FLOW BOOKING (User harus login untuk isi form)
    Route::get('/booking/form', [BookingController::class, 'create'])->name('booking.create'); // Form Input
    Route::post('/booking/store', [BookingController::class, 'store'])->name('booking.store'); // Simpan Data

    // Dashboard User (Cek Status Booking)
    Route::get('/my-dashboard', [BookingController::class, 'dashboard'])->name('user.dashboard');
});


// =========================================================================
// 3. ADMIN CMS (Full Akses Admin)
// =========================================================================
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {

    // A. DASHBOARD UTAMA ADMIN
    Route::get('/', function () {
        $totalProjects = \App\Models\Event::count();
        $totalClients = \App\Models\Client::count();
        $totalTestimonials = \App\Models\Testimonial::count();
        // Hitung juga booking yang pending biar admin aware
        $pendingBookings = \App\Models\Booking::where('status', 'pending')->count();

        return view('admin.dashboard', compact('totalProjects', 'totalClients', 'totalTestimonials', 'pendingBookings'));
    })->name('index');

    // B. KELOLA PORTOFOLIO (Resource)
    Route::resource('events', AdminEventController::class);

    // C. KELOLA CLIENT TRUST (Logo)
    Route::get('/clients', [AdminClientController::class, 'index'])->name('clients.index');
    Route::post('/clients', [AdminClientController::class, 'store'])->name('clients.store');
    Route::delete('/clients/{id}', [AdminClientController::class, 'destroy'])->name('clients.destroy');

    // D. KELOLA TESTIMONI
    Route::get('/testimonials', [AdminTestimonialController::class, 'index'])->name('testimonials.index');
    Route::post('/testimonials', [AdminTestimonialController::class, 'store'])->name('testimonials.store');
    Route::delete('/testimonials/{id}', [AdminTestimonialController::class, 'destroy'])->name('testimonials.destroy');

    // E. KELOLA BOOKING MASUK
    // Perbaikan: Jangan pakai 'admin.' lagi di name(), karena group sudah punya prefix 'admin.'
    Route::get('/bookings', [AdminBookingController::class, 'index'])->name('bookings.index');
    Route::put('/bookings/{id}', [AdminBookingController::class, 'updateStatus'])->name('bookings.update');
});


// =========================================================================
// 4. AUTHENTICATION
// =========================================================================
require __DIR__ . '/auth.php';
