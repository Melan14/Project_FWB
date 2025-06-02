@extends('layouts.app')

@section('title', 'Edit Tempat Kuliner')

@section('content')
<div class="container mt-4">
    <h2>Edit Tempat Kuliner</h2>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('vendor.spots.update', $spot->id) }}">
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

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('vendor.spots') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
