@extends('layouts.app_admin')

@section('title', 'Kelola Review')

@section('content')
<div class="container mt-4">
    <h2 class="fw-bold mb-4"><i class="fa-solid fa-comments me-2"></i> Kelola Review</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card shadow-sm">
        <div class="card-header bg-light fw-semibold">
            <i class="fa-solid fa-star-half-stroke me-2 text-warning"></i> Daftar Ulasan Pengguna
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-bordered table-hover mb-0">
                    <thead class="table-primary text-center align-middle">
                        <tr>
                            <th style="width: 15%;">👤 Foodie</th>
                            <th style="width: 20%;">🍽️ Tempat</th>
                            <th style="width: 10%;">⭐ Rating</th>
                            <th style="width: 30%;">💬 Komentar</th>
                            <th style="width: 15%;">📅 Tanggal</th>
                            <th style="width: 10%;">⚙️ Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($reviews as $review)
                        <tr class="align-middle">
                            <td style="vertical-align: middle;">{{ $review->user->name }}</td>
                            <td style="vertical-align: middle;">{{ $review->spot->nama }}</td>
                            <td style="vertical-align: middle;" class="text-center">
                                <span class="badge bg-warning text-dark">{{ $review->rating ?? '-' }} <i class="fa-solid fa-star"></i></span>
                            </td>
                            <td style="vertical-align: middle;">{{ $review->komentar ?? '-' }}</td>
                            <td style="vertical-align: middle;" class="text-center">{{ $review->created_at->format('d M Y') }}</td>
                            <td style="vertical-align: middle;" class="text-center">
                                <form action="{{ route('admin.reviews.destroy', $review->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus review ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted py-4">Belum ada review yang tersedia.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
