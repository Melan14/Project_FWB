<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\UserProfile;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function show()
    {
        $user = Auth::user();
        $profile = $user->profile; // relasi one-to-one
        return view('profile', compact('user', 'profile'));
    }

    public function edit()
    {
        $user = Auth::user();
        $profile = $user->profile;
        return view('profile_edit', compact('user', 'profile'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'bio' => 'nullable|string|max:255',
            'deskripsi' => 'nullable|string',
        ]);

        $user = Auth::user();
        $user->name = $request->name;
        $user->save();

        // Cek apakah user sudah punya profile
        $profile = $user->profile ?? new UserProfile(['user_id' => $user->id]);

        // Handle upload foto
        if ($request->hasFile('foto')) {
            if ($profile->foto && Storage::disk('public')->exists('profile_photos/' . $profile->foto)) {
                Storage::disk('public')->delete('profile_photos/' . $profile->foto);
            }

            $file = $request->file('foto');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('profile_photos', $filename, 'public');
            $profile->foto = $filename;
        }

        $profile->bio = $request->bio;
        $profile->deskripsi = $request->deskripsi;
        $profile->save();

        return redirect()->route('profile.show')->with('success', 'Profil berhasil diperbarui.');
    }
}
