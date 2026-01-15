<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User; // Pastikan model User diimport
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    /**
     * Menampilkan formulir Login.
     * Metode GET ditangani oleh routes/web.php (menampilkan view).
     */
    // Anda tidak perlu membuat metode ini jika rute GET hanya me-return view.

    /**
     * Memproses data registrasi dari form.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        // 1. Validasi Input
        // Pastikan nama dan email unik, dan password cocok dengan konfirmasi
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed', // 'confirmed' mencari field password_confirmation
        ], [
            // Pesan error custom (Opsional, untuk UX yang lebih baik)
            'name.required' => 'Nama wajib diisi.',
            'email.unique' => 'Email ini sudah terdaftar.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
        ]);

        // 2. Membuat User Baru
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Wajib di-hash sebelum disimpan!
        ]);

        // 3. Otentikasi dan Redirect
        // Login otomatis setelah registrasi
        Auth::login($user);

        // Redirect ke dashboard atau halaman yang aman (misalnya halaman Home)
        return redirect()->route('home')->with('success', 'Akun berhasil dibuat dan Anda sudah login!');
    }

    /**
     * Memproses data login dari form.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        // 1. Validasi Input
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        // 2. Proses Otentikasi
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Jika otentikasi berhasil
            $request->session()->regenerate();

            // Redirect ke halaman yang diinginkan (misalnya dashboard)
            return redirect()->intended('/dashboard')->with('success', 'Selamat datang kembali!');
        }

        // 3. Jika otentikasi gagal
        // Melemparkan exception validasi kembali ke form login dengan pesan error
        throw ValidationException::withMessages([
            'email' => ['Kredensial yang diberikan tidak cocok dengan catatan kami.'],
        ]);
    }

    /**
     * Logout pengguna yang sedang aktif.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'Anda berhasil keluar.');
    }
}