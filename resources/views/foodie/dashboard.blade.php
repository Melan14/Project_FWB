@extends('layouts.app_foodie')

@section('title', 'Dashboard Foodie')

@section('content')
<div class="container py-4">
    <div class="mb-5 text-center">
        <h1 class="fw-bold display-5">🍴 Selamat Datang, Foodie!</h1>
        <p class="text-muted fs-5">Eksplorasi tempat makan favorit & bagikan pengalaman kulinermu.</p>
    </div>

    <div class="row g-4">
        <!-- Eksplorasi Tempat Kuliner -->
        <div class="col-md-6">
            <div class="card border-0 shadow-sm h-100 hover-shadow">
                <div class="card-body text-center p-4">
                    <div class="mb-3">
                        <i class="fa-solid fa-compass fa-3x text-primary"></i>
                    </div>
                    <h5 class="fw-bold">Eksplorasi Kuliner</h5>
                    <p class="text-muted">Jelajahi tempat makan populer dan terbaru di Sulawesi Barat.</p>
                    <a href="{{ route('foodie.explore') }}" class="btn btn-primary">
                        <i class="fa-solid fa-location-dot me-1"></i> Jelajahi Sekarang
                    </a>
                </div>
            </div>
        </div>

        <!-- Tempat Favorit -->
        <div class="col-md-6">
            <div class="card border-0 shadow-sm h-100 hover-shadow">
                <div class="card-body text-center p-4">
                    <div class="mb-3">
                        <i class="fa-solid fa-heart fa-3x text-danger"></i>
                    </div>
                    <h5 class="fw-bold">Favorit Saya</h5>
                    <p class="text-muted">Lihat dan kelola daftar tempat kuliner favoritmu.</p>
                    <a href="{{ route('foodie.favorites') }}" class="btn btn-danger">
                        <i class="fa-solid fa-bookmark me-1"></i> Lihat Favorit
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
