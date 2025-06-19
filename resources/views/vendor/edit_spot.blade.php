@extends('layouts.app_vendor')

@section('title', 'Edit Tempat Kuliner')

@section('content')
<div class="container mt-4">
    <h2>Edit Tempat Kuliner</h2>

    {{-- Tampilkan error validasi --}}
    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Form Edit --}}
    <form method="POST" action="{{ route('vendor.spots.update', $spot->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="nama" value="{{ old('nama', $spot->nama) }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Lokasi</label>
            <input type="text" name="lokasi" value="{{ old('lokasi', $spot->lokasi) }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="deskripsi" class="form-control" required>{{ old('deskripsi', $spot->deskripsi) }}</textarea>
        </div>

        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-select" required>
                <option value="buka" {{ $spot->status === 'buka' ? 'selected' : '' }}>Buka</option>
                <option value="tutup" {{ $spot->status === 'tutup' ? 'selected' : '' }}>Tutup</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Foto Saat Ini</label><br>
            @if($spot->gambar)
                <img src="{{ asset('storage/' . $spot->gambar) }}" alt="Gambar saat ini" class="img-thumbnail mb-2" style="max-height: 200px;">
            @else
                <p class="text-muted">Belum ada gambar.</p>
            @endif
        </div>

        <div class="mb-3">
            <label>Ganti Gambar (opsional)</label>
            <input type="file" name="gambar" class="form-control" accept="image/*">
            <small class="text-muted">Kosongkan jika tidak ingin mengganti gambar. Maks: 2MB.</small>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('vendor.spots') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
