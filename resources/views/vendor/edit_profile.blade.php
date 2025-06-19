@extends('layouts.app_vendor')

@section('title', 'Edit Profil Vendor')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4 fw-bold">✏️ Edit Profil</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Terjadi kesalahan:</strong>
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Nama Lengkap</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', auth()->user()->name) }}" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Alamat Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email', auth()->user()->email) }}" required>
        </div>

        <div class="mb-3">
            <label for="foto" class="form-label">Foto Profil (opsional)</label><br>
            @if(auth()->user()->foto)
                <img src="{{ asset('storage/' . auth()->user()->foto) }}" alt="Foto" class="img-thumbnail mb-2" style="max-height: 120px;">
            @endif
            <input type="file" name="foto" class="form-control">
        </div>

        <div class="mb-3">
            <label for="bio" class="form-label">Bio</label>
            <textarea name="bio" class="form-control" rows="3">{{ old('bio', auth()->user()->bio) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi Diri</label>
            <textarea name="deskripsi" class="form-control" rows="4">{{ old('deskripsi', auth()->user()->deskripsi) }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">
            <i class="bi bi-check-circle"></i> Simpan Perubahan
        </button>
    </form>
</div>
@endsection
