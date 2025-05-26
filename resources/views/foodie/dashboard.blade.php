@extends('layouts.app')

@section('title', 'Dashboard Foodie')

@section('content')
    <h2>Halo Foodie!</h2>
    <p>Selamat menjelajah kuliner Sulawesi Barat 🍜</p>

    <h4>Rekomendasi Kuliner</h4>
    <div class="row">
        <div class="col-md-6">
            <div class="card mb-3">
                <img src="https://source.unsplash.com/600x400/?food" class="card-img-top" alt="Kuliner">
                <div class="card-body">
                    <h5 class="card-title">Ayam Penyet Sulbar</h5>
                    <p class="card-text">Rating: ⭐ 4.8</p>
                    <a href="#" class="btn btn-outline-primary">Lihat Detail</a>
                </div>
            </div>
        </div>
    </div>
@endsection
