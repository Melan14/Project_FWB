<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Review;
use App\Models\SpotKuliner;

class AdminController extends Controller
{
    public function manageUsers()
    {
        $users = User::where('role', '!=', 'admin')->get();
        return view('admin.users', compact('users'));
    }

    public function manageReviews()
    {
        $reviews = Review::with(['user', 'spot'])->get(); // Eager load relasi user dan spot
        return view('admin.reviews', compact('reviews'));
    }
    public function deleteUser($id)
{
    $user = User::findOrFail($id);
    $user->delete();

    return redirect()->route('admin.users')->with('success', 'User berhasil dihapus.');
}
}
