@extends('layouts.app')

@section('title', 'Ulasan Pelanggan')

@section('content')
    <h2>Ulasan untuk Tempat Kuliner Saya</h2>

    <table class="table table-striped mt-4">
        <thead class="table-dark">
            <tr>
                <th>Tempat Kuliner</th>
                <th>Foodie</th>
                <th>Rating</th>
                <th>Ulasan</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
            @forelse($reviews as $review)
                <tr>
                    <td>{{ $review->spot->nama }}</td>
                    <td>{{ $review->user->name }}</td>
                    <td>{{ $review->rating }} ⭐</td>
                    <td>{{ $review->ulasan }}</td>
                    <td>{{ $review->created_at->format('d M Y') }}</td>
                </tr>
            @empty
                <tr><td colspan="5">Belum ada ulasan.</td></tr>
            @endforelse
        </tbody>
    </table>
@endsection
