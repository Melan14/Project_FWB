<?php

namespace App\Http\Controllers;

use App\Models\SpotKuliner;
use App\Models\Review;
use App\Models\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FoodieController extends Controller
{
    //a) Menampilkan daftar tempat kuliner (eksplorasi)
    public function explore()
    {
        $spots = SpotKuliner::with(['reviews.user'])->latest()->get(); // spot + review + user
        return view('foodie.explore', compact('spots'));
    }

    //b) Form tambah review & rating
    public function addReview($spot_id)
    {
        $spot = SpotKuliner::findOrFail($spot_id);
        return view('foodie.add_review', compact('spot'));
    }

    //b) Simpan review & rating
    public function submitReview(Request $request, $spot_id)
    {
        $request->validate([
            'komentar' => 'nullable|string',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        Review::create([
            'spot_id' => $spot_id,
            'user_id' => Auth::id(),
            'komentar' => $request->komentar,
            'rating' => $request->rating,
        ]);

        return redirect()->route('foodie.explore')->with('success', 'Review berhasil dikirim.');
    }
    public function showSpot($id)
{
    $spot = SpotKuliner::with(['reviews.user'])->findOrFail($id);

    return view('foodie.spot_detail', compact('spot'));
}

    // c) Tambahkan spot ke favorit
    public function addFavorite($spot_id)
    {
        $user = Auth::user();
        $user->favorites()->syncWithoutDetaching([$spot_id]);

        return back()->with('success', 'Ditambahkan ke favorit.');
    }

    //c) Hapus spot dari favorit
    public function removeFavorite($spot_id)
    {
        $user = Auth::user();

        if ($user->favorites()->where('spot_id', $spot_id)->exists()) {
            $user->favorites()->detach($spot_id);
            return back()->with('success', 'Berhasil dihapus dari favorit.');
        }

        return back()->with('error', 'Tempat tidak ditemukan di favorit Anda.');
    }

    //c) Tampilkan tempat favorit
    public function favorites()
    {
        $favorites = Auth::user()->favorites()->with('reviews.user')->get();
        return view('foodie.favorites', compact('favorites'));
    }
    
    // ✅ Tampilkan form edit profil
    public function editProfile()
    {
        $profile = Auth::user()->profile;
        return view('foodie.edit_profile', compact('profile'));
    }

    // ✅ Proses simpan profil
    public function updateProfile(Request $request)
    {
        $request->validate([
            'bio' => 'nullable|string|max:500',
            'deskripsi' => 'nullable|string|max:1000',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $user = Auth::user();
        $profile = $user->profile ?? new UserProfile(['user_id' => $user->id]);

        $profile->bio = $request->bio;
        $profile->deskripsi = $request->deskripsi;

        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('profile', 'public');
            $profile->foto = $path;
        }

        $profile->save();

        return redirect()->route('profile.show')->with('success', 'Profil berhasil diperbarui.');
    }

}
