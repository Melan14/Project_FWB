@extends('layouts.app_admin')

@section('title', 'Dashboard Admin')

@section('content')
<div class="container mt-4">
    <h2 class="fw-bold mb-3"><i class="fa-solid fa-gauge me-1"></i> Dashboard Admin</h2>
    <p class="text-muted">Selamat datang di halaman admin. Berikut ringkasan data yang tersedia di sistem.</p>

    <div class="row mt-4">
        <div class="col-md-4 mb-3">
            <div class="card shadow border-0">
                <div class="card-body">
                    <h5 class="card-title"><i class="fa-solid fa-users me-2 text-primary"></i> Total Pengguna</h5>
                    <p class="display-6">{{ $totalUsers }}</p>
                    <small class="text-muted">Termasuk vendor dan foodie</small>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <div class="card shadow border-0">
                <div class="card-body">
                    <h5 class="card-title"><i class="fa-solid fa-store me-2 text-success"></i> Total Tempat Kuliner</h5>
                    <p class="display-6">{{ $totalSpots }}</p>
                    <small class="text-muted">Dikelola oleh vendor</small>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <div class="card shadow border-0">
                <div class="card-body">
                    <h5 class="card-title"><i class="fa-solid fa-star me-2 text-warning"></i> Total Review</h5>
                    <p class="display-6">{{ $totalReviews }}</p>
                    <small class="text-muted">Diberikan oleh pengguna</small>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-5">
        <h4><i class="fa-solid fa-chart-line me-1"></i> Aktivitas Terbaru</h4>
        <p class="text-muted">Ringkasan aktivitas sistem terbaru.</p>
        <ul class="list-group">
            @forelse($latestReviews as $review)
                <li class="list-group-item d-flex justify-content-between align-items-start">
                    <div class="ms-2 me-auto">
                       <div><strong>{{ $review->user->name ?? 'User tidak ditemukan' }}</strong>memberikan review pada
                        <strong>{{ $review->spot->nama ?? 'Tempat tidak ditemukan' }}</strong>
                        </div>
                        <small class="text-muted">{{ $review->created_at->diffForHumans() }}</small>
                    </div>
                    <span class="badge bg-warning text-dark">⭐ {{ $review->rating }}</span>
                </li>
            @empty
                <li class="list-group-item">Belum ada review terbaru.</li>
            @endforelse
        </ul>
    </div>
</div>
@endsection
