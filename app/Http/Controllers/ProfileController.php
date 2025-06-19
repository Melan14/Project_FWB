<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    // Menampilkan halaman profil berdasarkan role
    public function show()
    {
        $user = Auth::user();

        return match ($user->role) {
            'admin' => view('admin.profile', compact('user')),
            'vendor' => view('vendor.profile', compact('user')),
            'foodie' => view('foodie.profile', compact('user')),
            default => abort(403),
        };
    }

    // Menampilkan form edit profil
    public function editProfile()
{
    $profile = Auth::user()->profile;
    return view('foodie.edit_profile', compact('profile'));
}

public function updateProfile(Request $request)
{
    $request->validate([
        'bio' => 'nullable|string|max:500',
        'deskripsi' => 'nullable|string|max:1000',
        'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    $user = Auth::user();
    $profile = $user->profile ?? new \App\Models\UserProfile(['user_id' => $user->id]);

    $profile->bio = $request->bio;
    $profile->deskripsi = $request->deskripsi;

    if ($request->hasFile('foto')) {
        $fotoPath = $request->file('foto')->store('profile', 'public');
        $profile->foto = $fotoPath;
    }

    $profile->save();

    return redirect()->route('profile.show')->with('success', 'Profil berhasil diperbarui.');
}
}
