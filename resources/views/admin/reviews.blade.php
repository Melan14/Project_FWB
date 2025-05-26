@extends('layouts.app')

@section('title', 'Kelola Review')

@section('content')
    <h2>Kelola Review</h2>

    <table class="table table-striped mt-4">
        <thead class="table-dark">
            <tr>
                <th>Nama Foodie</th>
                <th>Tempat Kuliner</th>
                <th>Rating</th>
                <th>Ulasan</th>
                <th>Tanggal</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reviews as $review)
            <tr>
                <td>{{ $review->user->name }}</td>
                <td>{{ $review->spot->nama }}</td>
                <td>{{ $review->rating }}⭐</td>
                <td>{{ $review->ulasan }}</td>
                <td>{{ $review->created_at->format('d M Y') }}</td>
                <td>
                    <form action="{{ route('admin.reviews.destroy', $review->id) }}" method="POST" onsubmit="return confirm('Hapus review ini?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
