<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\SpotKuliner;
use App\Models\Review;

class VendorController extends Controller
{
    // ✅ 1. Dashboard Vendor
    public function dashboard()
    {
        $user = Auth::user();

        $spots = SpotKuliner::where('user_id', $user->id)->get();
        $totalSpots = $spots->count();
        $totalReviews = Review::whereIn('spot_id', $spots->pluck('id'))->count();
        $avgRating = Review::whereIn('spot_id', $spots->pluck('id'))->avg('rating');

        return view('vendor.dashboard', compact('spots', 'totalSpots', 'totalReviews', 'avgRating'));
    }

    // ✅ 2. Lihat daftar tempat kuliner milik vendor
    public function mySpots()
    {
        $spots = SpotKuliner::where('user_id', Auth::id())
                    ->with('reviews') // eager load review
                    ->get();

        return view('vendor.spots', compact('spots'));
    }

    // ✅ 3. Tampilkan form tambah tempat kuliner
    public function createSpot()
    {
        return view('vendor.create_spot');
    }

    // ✅ 4. Simpan tempat kuliner baru
    public function storeSpot(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'lokasi' => 'required|string',
            'deskripsi' => 'required|string',
            'status' => 'required|in:buka,tutup',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = [
            'user_id'   => Auth::id(),
            'nama'      => $request->nama,
            'lokasi'    => $request->lokasi,
            'deskripsi' => $request->deskripsi,
            'status'    => $request->status,
        ];

        if ($request->hasFile('gambar')) {
            $path = $request->file('gambar')->store('kuliner', 'public');
            $data['gambar'] = $path;
        }

        SpotKuliner::create($data);

        return redirect()->route('vendor.spots')->with('success', 'Tempat kuliner berhasil ditambahkan.');
    }

    // ✅ 5. Tampilkan form edit
    public function editSpot($id)
    {
        $spot = SpotKuliner::where('user_id', Auth::id())->findOrFail($id);
        return view('vendor.edit_spot', compact('spot'));
    }

    // ✅ 6. Update tempat kuliner
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
            'nama'      => $request->nama,
            'lokasi'    => $request->lokasi,
            'deskripsi' => $request->deskripsi,
            'status'    => $request->status,
        ];

        if ($request->hasFile('gambar')) {
            $path = $request->file('gambar')->store('kuliner', 'public');
            $data['gambar'] = $path;
        }

        $spot->update($data);

        return redirect()->route('vendor.spots')->with('success', 'Tempat kuliner berhasil diperbarui.');
    }

    // ✅ 7. Hapus tempat kuliner
    public function deleteSpot($id)
    {
        $spot = SpotKuliner::where('user_id', Auth::id())->findOrFail($id);
        $spot->delete();

        return redirect()->route('vendor.spots')->with('success', 'Tempat kuliner berhasil dihapus.');
    }

    // ✅ 8. Lihat review dari foodies untuk spot milik vendor (by spot ID)
    public function spotReviews($id)
    {
        $spot = SpotKuliner::where('id', $id)
                    ->where('user_id', Auth::id())
                    ->firstOrFail();

        $reviews = $spot->reviews()->with('user')->orderByDesc('created_at')->get();

        return view('vendor.reviews', compact('reviews', 'spot'));
    }

    // ✅ 9. Lihat semua review milik vendor (semua spot)
    public function reviews()
    {
        $reviews = Review::whereHas('spot', function ($q) {
                $q->where('user_id', auth()->id());
            })
            ->with('spot', 'user')
            ->orderByDesc('created_at')
            ->get();

        return view('vendor.reviews', compact('reviews'));
    }
}
