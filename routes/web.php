<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('dashboard');
});

Route::middleware(['auth'])->group(function () {
    Route::view('/admin', 'admin.dashboard');
    Route::view('/vendor', 'vendor.dashboard');
    Route::view('/foodie', 'foodie.dashboard');
});
Route::prefix('vendor')->middleware('auth')->group(function () {
    Route::get('/spots', [VendorController::class, 'mySpots'])->name('vendor.spots');
    Route::get('/spots/create', [VendorController::class, 'createSpot'])->name('vendor.create_spot');
    Route::post('/spots', [VendorController::class, 'storeSpot'])->name('vendor.spots.store');
    Route::get('/spots/{id}/edit', [VendorController::class, 'editSpot'])->name('vendor.edit_spot');
    Route::put('/spots/{id}', [VendorController::class, 'updateSpot'])->name('vendor.spots.update');
    Route::delete('/spots/{id}', [VendorController::class, 'deleteSpot'])->name('vendor.spots.delete');
    Route::get('/reviews', [VendorController::class, 'myReviews'])->name('vendor.reviews');
});

Route::get('/', function () {
    return view('auth.index');
});

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/register', [RegisterController::class, 'showForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);
Route::get('/admin/reviews', [AdminController::class, 'manageReviews'])->name('admin.reviews');
Route::get('/admin/users', [AdminController::class, 'manageUsers'])->name('admin.users');
Route::delete('/users/{id}', [AdminController::class, 'deleteUser'])->name('admin.users.destroy');

Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');




