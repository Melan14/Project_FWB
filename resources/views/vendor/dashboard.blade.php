@extends('layouts.app')

@section('title', 'Dashboard Vendor')

@section('content')
    <h2>Dashboard Vendor</h2>
    <p>Kelola tempat kuliner kamu di sini.</p>

    <a href="#" class="btn btn-primary mb-3">+ Tambah Tempat Kuliner</a>

    <div class="card">
        <div class="card-header">Daftar Tempat Kuliner</div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">Warung Sederhana - Mamuju</li>
            <li class="list-group-item">Cafe Laut - Polewali</li>
        </ul>
    </div>
@endsection
