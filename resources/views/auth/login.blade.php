@extends('layouts.auth')

@section('title', 'Login')

@section('content')
    <h3 class="text-center mb-4">Login Culinary Sulbar</h3>

    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required autofocus>
        </div>
        <div class="mb-3">
            <label>Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <button class="btn btn-primary w-100">Login</button>
    </form>

    {{-- Link kembali ke beranda --}}
    <div class="text-center mt-3">
        <a href="{{ url('/') }}" style="color: #007bff; text-decoration: underline;">
            <i class="fa-solid fa-arrow-left me-1"></i> Kembali ke Beranda
        </a>
    </div>
@endsection
