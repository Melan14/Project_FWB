<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Review;
use App\Models\SpotKuliner;

class AdminController extends Controller
{
    // Menampilkan halaman kelola pengguna
    public function manageUsers()
    {
        $users = User::where('role', '!=', 'admin')->get();
        return view('admin.users', compact('users'));
    }

    // Menampilkan halaman kelola review
   public function manageReviews()
{
    $reviews = Review::whereHas('spot')
        ->with('user', 'spot') // pastikan juga eager load user
        ->get();

    return view('admin.reviews', compact('reviews'));
}

    // Menghapus pengguna berdasarkan ID
    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.users')->with('success', 'User berhasil dihapus.');
    }

    // Menampilkan halaman laporan admin
    public function reports()
    {
        $totalUsers   = User::count();
        $totalVendors = User::where('role', 'vendor')->count();
        $totalSpots   = SpotKuliner::count();
        $totalReviews = Review::count();

        return view('admin.reports', compact(
            'totalUsers',
            'totalVendors',
            'totalSpots',
            'totalReviews'
        ));
    }

    // Menampilkan dashboard admin
    public function dashboard()
{
    $totalUsers    = User::where('role', '!=', 'admin')->count();
    $totalSpots    = SpotKuliner::count();
    $totalReviews  = Review::count();

    // Perbaikan: hanya ambil review yang masih punya user dan spot
    $latestReviews = Review::whereHas('user')
        ->whereHas('spot')
        ->with(['user', 'spot'])
        ->latest()
        ->take(5)
        ->get();

    return view('admin.dashboard', compact(
        'totalUsers',
        'totalSpots',
        'totalReviews',
        'latestReviews'
    ));
}

    // Menghapus review berdasarkan ID
    public function deleteReview($id)
    {
        $review = Review::findOrFail($id);
        $review->delete();

        return redirect()->route('admin.reviews')->with('success', 'Review berhasil dihapus.');
    }
}
