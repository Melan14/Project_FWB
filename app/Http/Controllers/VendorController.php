<?php

namespace App\Http\Controllers;
use App\Models\Review;
use App\Models\SpotKuliner;
use Illuminate\Http\Request;

class VendorController extends Controller
{
    public function mySpots()
{
    $spots = SpotKuliner::where('user_id', auth()->id())->get();
    return view('vendor.spots', compact('spots'));
}

public function myReviews()
{
    $reviews = Review::whereHas('spot', function($q) {
        $q->where('user_id', auth()->id());
    })->with('spot', 'user')->get();

    return view('vendor.reviews', compact('reviews'));
}

}
