@extends('layouts.app_admin')

@section('title', 'Laporan')

@section('content')
<div class="container mt-4">
    <h2>Laporan Data Sistem</h2>
    <ul class="list-group mt-3">
        <li class="list-group-item">Total User: {{ $totalUsers }}</li>
        <li class="list-group-item">Total Vendor: {{ $totalVendors }}</li>
        <li class="list-group-item">Total Spot Kuliner: {{ $totalSpots }}</li>
        <li class="list-group-item">Total Review: {{ $totalReviews }}</li>
    </ul>
</div>
@endsection
