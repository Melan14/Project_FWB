@extends('layouts.app_foodie')

@section('title', 'Detail Spot Kuliner')

@section('content')
<div class="container">
    {{-- 🔙 Tombol kembali kecil --}}
    <div class="mb-3">
        <a href="{{ url()->previous() }}" class="btn btn-sm btn-outline-secondary">
            <i class="fa-solid fa-arrow-left me-1"></i> Kembali
        </a>
    </div>

    <h2 class="fw-bold mb-3">{{ $spot->nama }}</h2>
    <img src="{{ asset('storage/' . $spot->gambar) }}" class="img-fluid mb-3" style="max-height:300px;">
    <p><strong>Lokasi:</strong> {{ $spot->lokasi }}</p>
    <p><strong>Deskripsi:</strong> {{ $spot->deskripsi }}</p>

    <hr>
    <h4 class="mt-4 mb-3">💬 Ulasan Foodie Lain</h4>
    @if($spot->reviews->count() > 0)
        @foreach($spot->reviews as $review)
            <div class="mb-3 p-3 bg-white shadow-sm rounded">
                <strong>{{ $review->user->name }}</strong> 
                <span class="text-warning">{{ str_repeat('⭐', $review->rating) }}</span>
                <p class="mt-1 mb-0">{{ $review->komentar }}</p>
                <small class="text-muted">{{ $review->created_at->diffForHumans() }}</small>
            </div>
        @endforeach
    @else
        <p class="text-muted">Belum ada ulasan.</p>
    @endif
</div>
@endsection
