@extends('layouts.app_foodie')

@section('title', 'Tulis Ulasan')

@section('content')
<div class="container mt-4">
    {{-- 🔙 Tombol kecil untuk kembali --}}
    <div class="mb-3">
        <a href="{{ url()->previous() }}" class="btn btn-sm btn-outline-secondary">
            <i class="fa-solid fa-arrow-left me-1"></i> Kembali
        </a>
    </div>

    <h4>Tulis Ulasan untuk <strong>{{ $spot->nama }}</strong></h4>

    <form action="{{ route('foodie.store_review', $spot->id) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="komentar" class="form-label">Komentar</label>
            <textarea class="form-control" name="komentar" rows="4" required></textarea>
        </div>
        <div class="mb-3">
            <label for="rating" class="form-label">Rating</label>
            <select class="form-select" name="rating" required>
                <option value="">Pilih rating</option>
                @for ($i = 1; $i <= 5; $i++)
                    <option value="{{ $i }}">{{ $i }} ⭐</option>
                @endfor
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Kirim</button>
    </form>
</div>
@endsection
