<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
// Panggil Library Intervention Image
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class AdminEventController extends Controller
{
    public function index()
    {
        $events = Event::latest()->paginate(10);
        return view('admin.events.index', compact('events'));
    }

    public function create()
    {
        return view('admin.events.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'date' => 'required',
            'location' => 'required',
            'client_name' => 'required',
            'status' => 'required',
            'image' => 'required|image|max:5120', // Max 5MB (Boleh besar karena nanti dikompres)
            'doc1' => 'nullable|image|max:5120',
            'doc2' => 'nullable|image|max:5120',
            'doc3' => 'nullable|image|max:5120',
        ]);

        $data = $request->except(['image', 'doc1', 'doc2', 'doc3']);

        // 1. Upload Cover Utama (Pakai Fungsi Ajaib)
        if ($request->hasFile('image')) {
            $data['image'] = $this->compressAndUpload($request->file('image'));
        }

        // 2. Upload Dokumentasi (Pakai Fungsi Ajaib)
        if ($request->hasFile('doc1')) $data['doc1'] = $this->compressAndUpload($request->file('doc1'));
        if ($request->hasFile('doc2')) $data['doc2'] = $this->compressAndUpload($request->file('doc2'));
        if ($request->hasFile('doc3')) $data['doc3'] = $this->compressAndUpload($request->file('doc3'));

        $data['price'] = 'Hubungi Kami';

        Event::create($data);

        return redirect()->route('admin.events.index')->with('success', 'Project berhasil disimpan & dikompres!');
    }

    public function edit($id)
    {
        $event = Event::findOrFail($id);
        return view('admin.events.edit', compact('event'));
    }

    public function update(Request $request, $id)
    {
        $event = Event::findOrFail($id);

        $request->validate([
            'title' => 'required',
            // Validasi lain...
            'image' => 'nullable|image|max:5120',
        ]);

        $data = $request->except(['image', 'doc1', 'doc2', 'doc3']);

        // Cek & Hapus Gambar Lama jika ada upload baru
        if ($request->hasFile('image')) {
            $this->deleteOldImage($event->image); // Hapus file lama
            $data['image'] = $this->compressAndUpload($request->file('image'));
        }
        
        if ($request->hasFile('doc1')) {
            $this->deleteOldImage($event->doc1);
            $data['doc1'] = $this->compressAndUpload($request->file('doc1'));
        }
        if ($request->hasFile('doc2')) {
            $this->deleteOldImage($event->doc2);
            $data['doc2'] = $this->compressAndUpload($request->file('doc2'));
        }
        if ($request->hasFile('doc3')) {
            $this->deleteOldImage($event->doc3);
            $data['doc3'] = $this->compressAndUpload($request->file('doc3'));
        }

        $event->update($data);

        return redirect()->route('admin.events.index')->with('success', 'Project berhasil diupdate!');
    }

    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        
        // Hapus semua file gambar dari server biar gak nyampah
        $this->deleteOldImage($event->image);
        $this->deleteOldImage($event->doc1);
        $this->deleteOldImage($event->doc2);
        $this->deleteOldImage($event->doc3);

        $event->delete();
        return redirect()->route('admin.events.index')->with('success', 'Project dihapus.');
    }

    // ==========================================
    // FUNGSI AJAIB: COMPRESS TO WEBP
    // ==========================================
    private function compressAndUpload($file)
    {
        // 1. Setup Manager (Driver GD)
        $manager = new ImageManager(new Driver());

        // 2. Baca Gambar
        $image = $manager->read($file);

        // 3. Resize (Scale)
        // Lebar dipaksa max 1000px, Tinggi menyesuaikan (biar file kecil)
        // Kalau gambar aslinya kecil, dia gak akan dibesarkan (upsize: false)
        $image->scale(width: 1000);

        // 4. Encode ke WebP dengan Kualitas 75%
        $encoded = $image->toWebp(quality: 75);

        // 5. Buat Nama Unik (.webp)
        $filename = time() . '_' . uniqid() . '.webp';
        
        // 6. Pastikan Folder 'events' Ada
        $path = storage_path('app/public/events');
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }

        // 7. Simpan File
        $encoded->save($path . '/' . $filename);

        // 8. Kembalikan Path Database
        return '/storage/events/' . $filename;
    }

    // Fungsi Hapus File Lama
    private function deleteOldImage($path)
    {
        if ($path) {
            // Ubah '/storage/events/abc.webp' jadi 'public/events/abc.webp' untuk dihapus
            $realPath = str_replace('/storage/', 'public/', $path);
            if (Storage::exists($realPath)) {
                Storage::delete($realPath);
            }
        }
    }
}