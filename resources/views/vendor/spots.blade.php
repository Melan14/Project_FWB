@extends('layouts.app_vendor')

@section('title', 'Tempat Kuliner Saya')

@section('content')
<div class="container mt-4">
    <h2>Daftar Tempat Kuliner Saya</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('vendor.create_spot') }}" class="btn btn-success mb-3">
        <i class="bi bi-plus-circle"></i> Tambah Tempat Kuliner
    </a>

    <div class="row">
        @forelse ($spots as $spot)
            <div class="col-md-6 mb-4">
                <div class="card shadow-sm h-100 d-flex flex-column justify-content-between">
                    @if($spot->gambar)
                        <img src="{{ asset('storage/' . $spot->gambar) }}" class="card-img-top" style="height: 200px; object-fit: cover;" alt="{{ $spot->nama }}">
                    @endif
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $spot->nama }}</h5>
                        <p class="text-muted mb-1">{{ $spot->lokasi }}</p>
                        <p class="mb-2">{{ Str::limit($spot->deskripsi, 100) }}</p>

                        @php
                            $rating = $spot->reviews->avg('rating');
                            $reviewCount = $spot->reviews->count();
                        @endphp

                        <div class="mt-auto d-flex justify-content-between align-items-center">
                            <span class="badge bg-{{ $spot->status === 'buka' ? 'success' : 'secondary' }}">
                                {{ ucfirst($spot->status) }}
                            </span>

                            @if($reviewCount > 0)
                                <span class="text-warning fw-bold small">
                                    ⭐ {{ number_format($rating, 1) }} ({{ $reviewCount }})
                                </span>
                            @else
                                <span class="text-muted small">Belum ada review</span>
                            @endif
                        </div>

                        <div class="mt-3 d-flex justify-content-between">
                           <a href="{{ route('vendor.spots.reviews', $spot->id) }}" class="text-decoration-none btn btn-sm btn-warning">Lihat Review</a>
                            <div>
                                <a href="{{ route('vendor.edit_spot', $spot->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                <form action="{{ route('vendor.spots.delete', $spot->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus tempat ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger">Hapus</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <p>Tidak ada tempat kuliner yang ditambahkan.</p>
        @endforelse
    </div>
</div>
@endsection
