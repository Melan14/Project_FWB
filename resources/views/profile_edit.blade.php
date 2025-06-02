@extends('layouts.app')

@section('title', 'Edit Profil')

@section('content')
<div class="container">
    <h2>Edit Profil</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')


        <div class="mb-3">
            <label for="name" class="form-label">Nama</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', auth()->user()->name) }}" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email', auth()->user()->email) }}" required>
        </div>

        <!-- Input File -->
<div class="mb-3">
    <label for="foto" class="form-label">Foto Profil</label>
    <input type="file" name="foto" class="form-control">
    @if(auth()->user()->profile && auth()->user()->profile->foto)
        <img src="{{ asset('storage/' . auth()->user()->profile->foto) }}" alt="Foto Profil" class="img-thumbnail mt-2" style="max-width: 150px;">
    @endif
</div>

<!-- Bio -->
<div class="mb-3">
    <label for="bio" class="form-label">Bio Singkat</label>
    <input type="text" name="bio" class="form-control" value="{{ old('bio', auth()->user()->profile->bio ?? '') }}">
</div>

<!-- Deskripsi -->
<div class="mb-3">
    <label for="deskripsi" class="form-label">Deskripsi</label>
    <textarea name="deskripsi" class="form-control" rows="4">{{ old('deskripsi', auth()->user()->profile->deskripsi ?? '') }}</textarea>
</div>

        <button type="submit" class="btn btn-success">Simpan Perubahan</button>
        <a href="{{ route('profile.show') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
