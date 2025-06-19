@extends('layouts.app_foodie')

@section('title', 'Eksplor Kuliner')

@section('content')
<div class="container">
    <h2 class="fw-bold mb-4">🍽️ Eksplor Tempat Kuliner</h2>

    @foreach($spots as $spot)
        <div class="card mb-4 shadow-sm">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="{{ asset('storage/' . $spot->gambar) }}" class="img-fluid rounded-start" alt="{{ $spot->nama }}">
                </div>
                <div class="col-md-8">
                    <div class="card-body d-flex flex-column justify-content-between h-100">
                        <div>
                            <h5 class="card-title">{{ $spot->nama }}</h5>
                            <p class="card-text">{{ $spot->deskripsi }}</p>
                            <p class="card-text"><small class="text-muted">Lokasi: {{ $spot->lokasi }}</small></p>
                            <p class="card-text">
                                Rating:
                                @php $avg = $spot->reviews->avg('rating'); @endphp
                                @if($avg)
                                    @for($i = 1; $i <= 5; $i++)
                                        <i class="fa{{ $i <= round($avg) ? 's' : 'r' }} fa-star text-warning"></i>
                                    @endfor
                                    <small class="text-muted">({{ number_format($avg,1) }})</small>
                                @else
                                    <span class="text-muted">Belum ada rating</span>
                                @endif
                            </p>
                        </div>

                        {{-- 🔘 Tombol Aksi --}}
                        <div class="mt-3 d-flex flex-wrap gap-2">
                            {{-- ✅ Tulis Ulasan --}}
                            <a href="{{ route('foodie.add_review', $spot->id) }}" class="btn btn-sm btn-outline-primary">
                                <i class="fa-solid fa-pen"></i> Tulis Ulasan
                            </a>

                            {{-- ✅ Lihat Review --}}
                            <a href="{{ route('foodie.spot_detail', $spot->id) }}" class="btn btn-sm btn-outline-info">
                                <i class="fa-solid fa-comments"></i> Lihat Review
                            </a>

                            {{-- ✅ Tambah / Hapus Favorit --}}
                            @if(auth()->user()->favorites->contains($spot->id))
                                <form action="{{ route('foodie.remove_favorite', $spot->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger">
                                        <i class="fa-solid fa-heart-crack"></i> Hapus Favorit
                                    </button>
                                </form>
                            @else
                                <form action="{{ route('foodie.add_favorite', $spot->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-outline-success">
                                        <i class="fa-solid fa-heart"></i> Tambah Favorit
                                    </button>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection
