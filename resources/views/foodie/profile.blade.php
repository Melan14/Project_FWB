@extends('layouts.app_foodie')

@section('title', 'Profil Saya')

@section('content')
<div class="container">
    <h2 class="mb-4"><i class="fa-solid fa-user-circle me-2"></i>Profil Saya</h2>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fa-solid fa-check-circle me-1"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="card shadow-lg border-0 rounded-4 overflow-hidden">
        <div class="row g-0">
            <div class="col-md-4 bg-dark text-white text-center d-flex flex-column justify-content-center align-items-center p-4">
                @php
                    $profile = auth()->user()->profile;
                    $fotoPath = $profile && $profile->foto ? asset('storage/' . $profile->foto) : 'https://via.placeholder.com/180x180.png?text=No+Image';
                @endphp

                <img src="{{ $fotoPath }}" class="img-fluid rounded-circle mb-3 shadow" style="width: 180px; height: 180px; object-fit: cover;">

                <h4>{{ auth()->user()->name }}</h4>
                <p class="text-muted small">{{ auth()->user()->role ?? 'User' }}</p>
            </div>

            <div class="col-md-8 bg-light p-4">
                <h5 class="mb-3"><i class="fa-solid fa-id-card me-2"></i>Informasi Akun</h5>
                <ul class="list-group list-group-flush mb-3">
                    <li class="list-group-item"><strong>Email:</strong> {{ auth()->user()->email }}</li>
                    <li class="list-group-item"><strong>Tanggal Daftar:</strong> {{ auth()->user()->created_at->format('d M Y') }}</li>
                </ul>

                <h5 class="mb-3"><i class="fa-solid fa-address-card me-2"></i>Profil</h5>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><strong>Bio:</strong> {{ $profile->bio ?? '-' }}</li>
                    <li class="list-group-item"><strong>Deskripsi:</strong> {{ $profile->deskripsi ?? '-' }}</li>
                </ul>

                <a href="{{ route('profile.edit') }}" class="btn btn-primary mt-4">
                    <i class="fa-solid fa-pen-to-square me-1"></i> Edit Profil
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
