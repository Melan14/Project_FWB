@extends('layouts.app')

@section('title', 'Tempatku')

@section('content')
    <h2>Tempat Kuliner Saya</h2>

    <a href="{{ route('vendor.spots.create') }}" class="btn btn-primary mb-3">Tambah Tempat Baru</a>

    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>Nama Tempat</th>
                <th>Lokasi</th>
                <th>Deskripsi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($spots as $spot)
                <tr>
                    <td>{{ $spot->nama }}</td>
                    <td>{{ $spot->lokasi }}</td>
                    <td>{{ Str::limit($spot->deskripsi, 50) }}</td>
                    <td>
                        <a href="{{ route('vendor.spots.edit', $spot->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('vendor.spots.destroy', $spot->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus tempat ini?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="4">Belum ada tempat kuliner.</td></tr>
            @endforelse
        </tbody>
    </table>
@endsection
