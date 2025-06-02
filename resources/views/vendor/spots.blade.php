@extends('layouts.app')

@section('title', 'Tempat Kuliner Saya')

@section('content')
<div class="container">
    <h2 class="mb-4">Tempat Kuliner Saya</h2>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('vendor.create_spot') }}" class="btn btn-success mb-4">
        + Tambah Tempat Kuliner
    </a>

    @if ($spots->isEmpty())
        <div class="alert alert-info">Belum ada tempat kuliner yang didaftarkan.</div>
    @else
        <div class="row">
            @foreach ($spots as $spot)
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card h-100 shadow-sm">
                        @if ($spot->gambar)
                            <img src="{{ asset('storage/' . $spot->gambar) }}" class="card-img-top" alt="{{ $spot->nama }}" style="height: 200px; object-fit: cover;">
                        @else
                            <img src="https://via.placeholder.com/400x200?text=No+Image" class="card-img-top" alt="Default image">
                        @endif

                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $spot->nama }}</h5>
                            <p class="card-text"><strong>Lokasi:</strong> {{ $spot->lokasi }}</p>
                            <p class="card-text"><strong>Status:</strong> 
                                <span class="badge bg-{{ $spot->status == 'buka' ? 'success' : 'secondary' }}">
                                    {{ ucfirst($spot->status) }}
                                </span>
                            </p>

                            <div class="mt-auto d-flex justify-content-between">
                                <a href="{{ route('vendor.edit_spot', $spot->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                
                                <form action="{{ route('vendor.delete_spot', $spot->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus tempat kuliner ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm">Hapus</button>
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
