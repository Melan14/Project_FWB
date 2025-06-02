@extends('layouts.auth')

@section('title', 'Register')

@section('content')
    <h3 class="text-center mb-4">Daftar Culinary Sulbar</h3>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Konfirmasi Password</label>
            <input type="password" name="password_confirmation" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Daftar Sebagai</label>
            <select name="role" class="form-control" required>
                <option value="">-- Pilih Role --</option>
                <option value="vendor">Vendor</option>
                <option value="foodie">Foodie</option>
            </select>
        </div>

        <button class="btn btn-primary w-100">Daftar</button>
    </form>
@endsection
