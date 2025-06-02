@extends('layouts.app')

@section('title', 'Dashboard Vendor')

@section('content')
<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold">👨‍🍳 Dashboard Vendor</h2>
            <p class="text-muted">Kelola tempat kuliner kamu dengan mudah dan cepat.</p>
        </div>
        <a href="{{ route('vendor.create_spot') }}" class="btn btn-success btn-lg shadow">
            <i class="bi bi-plus-circle me-1"></i> + Tambah Tempat Kuliner
        </a>
    </div>

    <div class="card shadow-sm">
        <div class="card-header bg-success text-white fw-semibold">
            <i class="bi bi-list-ul me-1"></i> Daftar Tempat Kuliner Anda
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <div>
                    <strong>Warung Sederhana</strong><br>
                    <small class="text-muted">Mamuju</small>
                </div>
                <span class="badge bg-primary">Terdaftar</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <div>
                    <strong>Cafe Laut</strong><br>
                    <small class="text-muted">Polewali</small>
                </div>
                <span class="badge bg-primary">Terdaftar</span>
            </li>
        </ul>
    </div>

</div>
@endsection
