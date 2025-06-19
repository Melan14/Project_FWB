@extends('layouts.app_vendor')

@section('title', 'Tambah Tempat Kuliner')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-success text-white">
            <h4 class="mb-0"><i class="bi bi-plus-circle me-2"></i>Tambah Tempat Kuliner</h4>
        </div>
        <div class="card-body">
        <form method="POST" action="{{ route('vendor.spots.store') }}" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Nama Tempat</label>
                    <input type="text" name="nama" class="form-control" placeholder="Contoh: Warung Sederhana" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Lokasi</label>
                    <input type="text" name="lokasi" class="form-control" placeholder="Contoh: Mamuju, Sulawesi Barat" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Deskripsi</label>
                    <textarea name="deskripsi" class="form-control" rows="4" placeholder="Jelaskan keunikan kuliner ini..." required></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-select" required>
                        <option value="">-- Pilih Status --</option>
                        <option value="buka">Buka</option>
                        <option value="tutup">Tutup</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Foto Tempat Kuliner</label>
                    <input type="file" name="gambar" class="form-control" accept="image/*" required>
                    <small class="text-muted">Ukuran maksimal 2MB. Format: jpg, png.</small>
                </div>

                <button type="submit" class="btn btn-success">
                    <i class="bi bi-save me-1"></i> Simpan
                </button>
            </form>
        </div>
    </div>
</div>

@endsection
