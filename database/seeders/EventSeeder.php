<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Event;
use Illuminate\Support\Facades\DB;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Kosongkan tabel events dulu agar tidak duplikat saat seeding ulang
        // DB::table('events')->truncate(); // Uncomment baris ini jika ingin menghapus data lama

        $events = [
            // 1. Upcoming
            [
                'title' => 'Stukka Music Fest: Indie Night',
                'date' => '20 Jan 2026',
                'location' => 'Stadion Madya GBK, Jakarta',
                'price' => 'IDR 250.000',
                'image' => 'https://images.unsplash.com/photo-1501281668745-f7f57925c3b4?auto=format&fit=crop&w=800&q=80',
                'status' => 'upcoming',
            ],
            // 2. Ongoing
            [
                'title' => 'Digital Creative Workshop 2026',
                'date' => '10 Jan 2026',
                'location' => 'Stukka Hub, Bandung',
                'price' => 'Gratis',
                'image' => 'https://images.unsplash.com/photo-1540575861501-7c03114dc23a?auto=format&fit=crop&w=800&q=80',
                'status' => 'ongoing',
            ],
            // 3. Closed
            [
                'title' => 'New Year Eve Party with Stukka',
                'date' => '31 Dec 2025',
                'location' => 'PIK Avenue, Jakarta',
                'price' => 'IDR 500.000',
                'image' => 'https://images.unsplash.com/photo-1470225620780-dba8ba36b745?auto=format&fit=crop&w=800&q=80',
                'status' => 'closed',
            ],
            // 4. Upcoming
            [
                'title' => 'Wedding Expo: Eternal Love',
                'date' => '15 Feb 2026',
                'location' => 'Ritz Carlton, Mega Kuningan',
                'price' => 'IDR 100.000',
                'image' => 'https://images.unsplash.com/photo-1519741497674-611481863552?auto=format&fit=crop&w=800&q=80',
                'status' => 'upcoming',
            ],
            // 5. Closed
            [
                'title' => 'Corporate Tech Summit',
                'date' => '05 Jan 2026',
                'location' => 'ICE BSD, Tangerang',
                'price' => 'IDR 1.200.000',
                'image' => 'https://images.unsplash.com/photo-1505373877841-8d25f7d46678?auto=format&fit=crop&w=800&q=80',
                'status' => 'closed',
            ],
            // 6. Upcoming
            [
                'title' => 'Jazz by the Sea: Bali Edition',
                'date' => '20 Mar 2026',
                'location' => 'Nusa Dua Beach, Bali',
                'price' => 'IDR 750.000',
                'image' => 'https://plus.unsplash.com/premium_photo-1677829177642-30def98b0963?q=80&w=1170&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                'status' => 'upcoming',
            ],
            // 7. Upcoming
            [
                'title' => 'E-Sport National Championship',
                'date' => '10 Apr 2026',
                'location' => 'Tennis Indoor Senayan',
                'price' => 'IDR 150.000',
                'image' => 'https://images.unsplash.com/photo-1542751371-adc38448a05e?auto=format&fit=crop&w=800&q=80',
                'status' => 'upcoming',
            ],
            // 8. Ongoing
            [
                'title' => 'Art Installation: Modern Life',
                'date' => '01-15 Jan 2026',
                'location' => 'Museum Macan, Jakarta',
                'price' => 'IDR 75.000',
                'image' => 'https://images.unsplash.com/photo-1547891654-e66ed7ebb968?auto=format&fit=crop&w=800&q=80',
                'status' => 'ongoing',
            ],
            // 9. Upcoming
            [
                'title' => 'Food Festival: Rasa Nusantara',
                'date' => '05 May 2026',
                'location' => 'Parkir Timur Senayan',
                'price' => 'Gratis',
                'image' => 'https://images.unsplash.com/photo-1555939594-58d7cb561ad1?auto=format&fit=crop&w=800&q=80',
                'status' => 'upcoming',
            ],
            // 10. Closed
            [
                'title' => 'Startup Pitch Battle 2025',
                'date' => '20 Dec 2025',
                'location' => 'Ciputra Artpreneur',
                'price' => 'IDR 300.000',
                'image' => 'https://images.unsplash.com/photo-1556761175-5973dc0f32e7?auto=format&fit=crop&w=800&q=80',
                'status' => 'closed',
            ],
            // 11. Upcoming
            [
                'title' => 'Photography Masterclass',
                'date' => '15 Jun 2026',
                'location' => 'Plataran Menteng',
                'price' => 'IDR 2.500.000',
                'image' => 'https://images.unsplash.com/photo-1554048612-387768052bf7?auto=format&fit=crop&w=800&q=80',
                'status' => 'upcoming',
            ],
            // 12. Upcoming
            [
                'title' => 'Summer Pop Festival',
                'date' => '10 Jul 2026',
                'location' => 'Ancol Ecopark',
                'price' => 'IDR 450.000',
                'image' => 'https://images.unsplash.com/photo-1459749411177-2293291f83fe?auto=format&fit=crop&w=800&q=80',
                'status' => 'upcoming',
            ],
            // 13. Closed
            [
                'title' => 'Annual Charity Gala',
                'date' => '10 Nov 2025',
                'location' => 'Hotel Mulia Senayan',
                'price' => 'IDR 5.000.000',
                'image' => 'https://images.unsplash.com/photo-1511795409834-ef04bbd61622?auto=format&fit=crop&w=800&q=80',
                'status' => 'closed',
            ],
            // 14. Upcoming
            [
                'title' => 'Marathon for Hope',
                'date' => '08 Aug 2026',
                'location' => 'Monas Area',
                'price' => 'IDR 200.000',
                'image' => 'https://images.unsplash.com/photo-1552674605-46d536697d43?auto=format&fit=crop&w=800&q=80',
                'status' => 'upcoming',
            ],
            // 15. Ongoing
            [
                'title' => 'Virtual Tech Conference',
                'date' => '09-11 Jan 2026',
                'location' => 'Online (Zoom)',
                'price' => 'IDR 50.000',
                'image' => 'https://images.unsplash.com/photo-1588196749597-9ff075ee6b5b?auto=format&fit=crop&w=800&q=80',
                'status' => 'ongoing',
            ],
        ];

        foreach ($events as $event) {
            Event::create($event);
        }
    }
}