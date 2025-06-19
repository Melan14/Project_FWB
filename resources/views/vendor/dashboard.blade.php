@extends('layouts.app_vendor')

@section('title', 'Dashboard Vendor')

@section('content')
<div class="container mt-4">
    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold">👨‍🍳 Dashboard Vendor</h2>
            <p class="text-muted">Selamat datang kembali, {{ Auth::user()->name }}! Kelola tempat kulinermu dengan mudah.</p>
        </div>
        <a href="{{ route('vendor.create_spot') }}" class="btn btn-success shadow-sm">
            <i class="bi bi-plus-circle me-1"></i>+ Tambah Tempat Kuliner
        </a>
    </div>

    <!-- Ringkasan Statistik -->
    <div class="row mb-4">
        <div class="col-md-4 mb-3">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h5 class="card-title"><i class="bi bi-shop-window me-2"></i>Total Spot Kuliner</h5>
                    <h3 class="fw-bold text-success">{{ $totalSpots }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h5 class="card-title"><i class="bi bi-chat-left-text me-2"></i>Total Ulasan</h5>
                    <h3 class="fw-bold text-primary">{{ $totalReviews }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h5 class="card-title"><i class="bi bi-star-fill me-2"></i>Rating Rata-rata</h5>
                    <h3 class="fw-bold text-warning">{{ number_format($avgRating, 1) ?? '0.0' }}</h3>
                </div>
            </div>
        </div>
    </div>

    <!-- Daftar Spot Kuliner -->
    <div class="card shadow-sm border-0">
        <div class="card-header bg-success text-white fw-semibold">
            <i class="bi bi-list-ul me-1"></i> Daftar Tempat Kuliner Anda
        </div>
        <ul class="list-group list-group-flush">
            @forelse($spots as $spot)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div>
                       <h5 class="card-title">{{ $spot->nama }}</h5>
                        <small class="text-muted">{{ $spot->lokasi }}</small>
                    </div>
                    <div class="text-end">
                        <a href="{{ route('vendor.edit_spot', $spot->id) }}" class="btn btn-sm btn-outline-secondary mt-1">Edit</a>
                        <a href="{{ route('vendor.spots.reviews', $spot->id) }}" class="btn btn-sm btn-outline-info mt-1">Lihat Review</a>
                    </div>
                </li>
            @empty
                <li class="list-group-item text-center text-muted">Belum ada tempat kuliner yang didaftarkan.</li>
            @endforelse
        </ul>
    </div>
</div>
@endsection
