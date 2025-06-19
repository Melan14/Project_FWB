@extends('layouts.app_foodie')

@section('title', 'Tempat Favorit Saya')

@section('content')
<div class="container mt-4">
    <h2 class="fw-bold mb-4">❤️ Tempat Kuliner Favorit Saya</h2>

    @if($favorites->isEmpty())
        <div class="alert alert-info">
            Kamu belum menambahkan tempat kuliner ke favorit.
        </div>
    @else
        <div class="row row-cols-1 row-cols-md-2 g-4">
            @foreach($favorites as $spot)
                <div class="col">
                    <div class="card shadow-sm h-100">
                        @if($spot->gambar)
                            <img src="{{ asset('storage/' . $spot->gambar) }}" class="card-img-top" style="height: 200px; object-fit: cover;" alt="{{ $spot->nama }}">
                        @endif
                        <div class="card-body d-flex flex-column justify-content-between">
                            <div>
                                <h5 class="card-title">{{ $spot->nama }}</h5>
                                <p class="card-text text-muted">
                                    <i class="fa-solid fa-location-dot me-1"></i> {{ $spot->lokasi }}
                                </p>
                                <p class="mb-2">
                                    <strong>Rating:</strong>
                                    @php
                                        $avg = $spot->reviews->avg('rating');
                                    @endphp
                                    @if($avg)
                                        @for($i = 1; $i <= 5; $i++)
                                            <i class="fa{{ $i <= round($avg) ? 's' : 'r' }} fa-star text-warning"></i>
                                        @endfor
                                        <small class="text-muted">({{ number_format($avg, 1) }})</small>
                                    @else
                                        <span class="text-muted">Belum ada rating</span>
                                    @endif
                                </p>
                            </div>

                            {{-- Tombol sejajar --}}
                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <a href="{{ route('foodie.spot_detail', $spot->id) }}" class="btn btn-sm btn-info">
                                    <i class="fa-solid fa-comments"></i> Lihat Review
                                </a>
                                <form action="{{ route('foodie.remove_favorite', $spot->id) }}" method="POST" onsubmit="return confirm('Hapus dari favorit?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger">
                                        <i class="fa-solid fa-trash"></i> Hapus
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
