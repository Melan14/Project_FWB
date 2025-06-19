@extends('layouts.app_vendor')

@section('title', 'Review Spot Kuliner')

@section('content')
<div class="container mt-4">
    <h2>Review untuk: {{ $spot->nama ?? 'Semua Tempat Kuliner' }}</h2>
    <p class="text-muted">{{ $spot->lokasi ?? '' }}</p>
    <hr>

    @if($reviews->count())
        @foreach($reviews as $review)
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">{{ $review->user->name ?? 'Pengguna' }}</h5>
                    <h6 class="card-subtitle mb-2 text-warning">⭐ {{ $review->rating }}</h6>
                    <p class="card-text">{{ $review->komentar }}</p>
                </div>
            </div>
        @endforeach
    @else
        <p class="text-muted">Belum ada review untuk tempat ini.</p>
    @endif

    <a href="{{ route('vendor.spots') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection
