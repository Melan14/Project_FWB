<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\SpotKuliner;
use App\Models\Review;

class VendorController extends Controller
{
    // ✅ 1. Lihat daftar tempat kuliner milik vendor
    public function mySpots()
    {
        $spots = SpotKuliner::where('user_id', Auth::id())->get();
        return view('vendor.spots', compact('spots'));
    }

    // ✅ 2. Tampilkan form tambah tempat kuliner
    public function createSpot()
    {
        return view('vendor.create_spot');
    }

    // ✅ 3. Simpan tempat kuliner baru
   public function storeSpot(Request $request)
{
    $request->validate([
        'nama' => 'required|string|max:255',
        'lokasi' => 'required|string',
        'deskripsi' => 'required|string',
        'status' => 'required|in:aktif,nonaktif',
        'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    ]);

    $data = [
        'user_id' => Auth::id(),
        'nama' => $request->nama,
        'lokasi' => $request->lokasi,
        'deskripsi' => $request->deskripsi,
        'status' => $request->status,
    ];

    if ($request->hasFile('gambar')) {
        $path = $request->file('gambar')->store('kuliner', 'public');
        $data['gambar'] = $path;
    }

    SpotKuliner::create($data); // ✅ Simpan data baru

    return redirect()->route('vendor.spots')->with('success', 'Tempat kuliner berhasil ditambahkan.');
}

    // ✅ 4. Tampilkan form edit
    public function editSpot($id)
    {
        $spot = SpotKuliner::where('user_id', Auth::id())->findOrFail($id);
        return view('vendor.edit_spot', compact('spot'));
    }

    // ✅ 5. Update tempat kuliner
    public function updateSpot(Request $request, $id)
    {
        $spot = SpotKuliner::where('user_id', Auth::id())->findOrFail($id);

        $request->validate([
            'nama' => 'required|string|max:255',
            'lokasi' => 'required|string',
            'deskripsi' => 'required|string',
            'status' => 'required|in:buka,tutup',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = [
            'nama' => $request->nama,
            'lokasi' => $request->lokasi,
            'deskripsi' => $request->deskripsi,
            'status' => $request->status,
        ];

        if ($request->hasFile('gambar')) {
            $path = $request->file('gambar')->store('kuliner', 'public');
            $data['gambar'] = $path;
        }

        $spot->update($data);

        return redirect()->route('vendor.spots')->with('success', 'Tempat kuliner berhasil diperbarui.');
    }

    // ✅ 6. Hapus tempat kuliner
    public function deleteSpot($id)
    {
        $spot = SpotKuliner::where('user_id', Auth::id())->findOrFail($id);
        $spot->delete();

        return redirect()->route('vendor.spots')->with('success', 'Tempat kuliner berhasil dihapus.');
    }

    // ✅ 7. Lihat review dari foodies untuk spot milik vendor
    public function myReviews()
    {
        $reviews = Review::whereHas('spot', function ($q) {
            $q->where('user_id', Auth::id());
        })->with('spot', 'user')->orderByDesc('created_at')->get();

        return view('vendor.reviews', compact('reviews'));
    }
}
