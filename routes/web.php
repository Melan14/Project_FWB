<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FoodieController;

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('auth.index');
});

//autentikasi
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/register', [RegisterController::class, 'showForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

//vendor
Route::middleware(['auth'])->prefix('vendor')->name('vendor.')->group(function () {
    Route::get('/', [VendorController::class, 'dashboard'])->name('dashboard');
    Route::get('/spots', [VendorController::class, 'mySpots'])->name('spots');
    Route::get('/spots/create', [VendorController::class, 'createSpot'])->name('create_spot');
    Route::post('/spots', [VendorController::class, 'storeSpot'])->name('spots.store');
    Route::get('/spots/{id}/edit', [VendorController::class, 'editSpot'])->name('edit_spot');
    Route::put('/spots/{id}', [VendorController::class, 'updateSpot'])->name('spots.update');
    Route::delete('/spots/{id}', [VendorController::class, 'deleteSpot'])->name('spots.delete');
    Route::get('/spots/{id}/reviews', [VendorController::class, 'spotReviews'])->name('spots.reviews');
    Route::get('/reviews', [VendorController::class, 'reviews'])->name('reviews');
});

//profil
Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
Route::get('/profile/edit', [ProfileController::class, 'editProfile'])->name('profile.edit');
Route::put('/profile/update', [ProfileController::class, 'updateProfile'])->name('profile.update');

//admin
Route::get('/admin/spots', [AdminController::class, 'spots'])->name('admin.spots');
Route::get('/admin/reports', [AdminController::class, 'reports'])->name('admin.reports');
Route::get('/admin', [AdminController::class, 'dashboard'])->name('admin.dashboard');
Route::delete('/admin/reviews/{id}', [AdminController::class, 'deleteReview'])->name('admin.reviews.destroy');
Route::get('/admin/reviews', [AdminController::class, 'manageReviews'])->name('admin.reviews');
Route::get('/admin/users', [AdminController::class, 'manageUsers'])->name('admin.users');
Route::delete('/users/{id}', [AdminController::class, 'deleteUser'])->name('admin.users.destroy');

// Foodie 
Route::prefix('foodie')->middleware('auth')->group(function () {
    Route::get('/', fn() => view('foodie.dashboard'))->name('foodie.dashboard');
    Route::get('/explore', [FoodieController::class, 'explore'])->name('foodie.explore');

    // Review
    Route::get('/review/{spot}', [FoodieController::class, 'addReview'])->name('foodie.add_review');
    Route::post('/review/{spot}', [FoodieController::class, 'submitReview'])->name('foodie.store_review');
    Route::get('/foodie/spots/{id}', [FoodieController::class, 'showSpot'])->name('foodie.spot_detail');

    // Favorite
    Route::post('/favorites/{spot}', [FoodieController::class, 'addFavorite'])->name('foodie.add_favorite');
    Route::delete('/favorites/{spot}', [FoodieController::class, 'removeFavorite'])->name('foodie.remove_favorite');
    Route::get('/favorites', [FoodieController::class, 'favorites'])->name('foodie.favorites');
});
