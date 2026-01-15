<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Buat 1 Akun Admin Default
        User::factory()->create([
            'name' => 'Admin Stukka',
            'email' => 'admin@stukka.com',
            'password' => Hash::make('password'), // Password: password
            'usertype' => 'admin', // <--- PENTING! Set langsung jadi admin
        ]);

        // Buat 1 Akun User Biasa (Untuk ngetes)
        User::factory()->create([
            'name' => 'User Biasa',
            'email' => 'user@gmail.com',
            'password' => Hash::make('password'),
            'usertype' => 'user',
        ]);
    }
}