<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    //tampilkan form login
    public function showLoginForm()
    {
        return view('auth.login');
    }

   //proses login
    public function login(Request $request)
    {
        // Validasi input
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Cari user berdasarkan email
        $user = User::where('email', $credentials['email'])->first();

        // Jika user ditemukan dan password cocok
        if ($user && Hash::check($credentials['password'], $user->password)) {
            Auth::login($user); // Login manual

            // Arahkan sesuai role
            switch ($user->role) {
                case 'admin':
                    return redirect('/admin');
                case 'vendor':
                    return redirect('/vendor');
                case 'foodie':
                    return redirect('/foodie');
                default:
                    return redirect('/');
            }
        }

        // Jika gagal login
        return back()->withErrors(['email' => 'Email atau password salah.']);
    }

    //logout user
public function logout(Request $request)
{
    Auth::logout();

    // Invalidate session dan regenerate token untuk keamanan
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/login');
}
}
