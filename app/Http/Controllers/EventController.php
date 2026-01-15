<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index(Request $request)
    {
        $query = Event::query();

        // 1. Logika Search
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('location', 'like', "%{$search}%");
            });
        }

        // 2. Logika Filter (Tetap dipertahankan)
        if ($request->filled('status')) {
            if ($request->status == 'upcoming') {
                $query->where('status', 'upcoming');
            } elseif ($request->status == 'ongoing') {
                $query->where('status', 'ongoing');
            } elseif ($request->status == 'finished') {
                $query->whereIn('status', ['finished', 'closed']);
            }
        }

        $events = $query->orderBy('date', 'desc')->paginate(9)->withQueryString();

        // UBAH: Return ke view 'pages.portfolio'
        return view('pages.portfolio', compact('events'));
    }

    public function show($id)
    {
        $event = Event::findOrFail($id);
        
        // UBAH: Return ke view 'pages.detail' (Namanya tetap detail tidak masalah)
        return view('pages.detail', compact('event'));
    }
}