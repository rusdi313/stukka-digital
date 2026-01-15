<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminClientController extends Controller
{
    public function index() {
    $clients = \App\Models\Client::all();
    return view('admin.clients.index', compact('clients'));
    }

    public function store(Request $request) {
        $request->validate(['logo' => 'required|image|max:2048']);
        $path = $request->file('logo')->store('clients', 'public');
        \App\Models\Client::create(['logo' => '/storage/' . $path, 'name' => $request->name]);
        return back()->with('success', 'Logo Klien ditambahkan!');
    }

    public function destroy($id) {
        $client = \App\Models\Client::findOrFail($id);
        // Hapus file fisik jika perlu (gunakan Storage::delete)
        $client->delete();
        return back()->with('success', 'Logo dihapus.');
    }
}
