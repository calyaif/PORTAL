<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User; // Menggunakan model tabel users bawaan Laravel

class AuthController extends Controller
{
    // Menampilkan form login
    public function showLogin()
    {
        return view('login');
    }

    // Menampilkan form pendaftaran
    public function showRegister()
    {
        return view('register');
    }

    // Memproses pendaftaran
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6'
        ]);

        // Simpan ke database bawaan laravel (tabel users)
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password) // Password diamankan dengan Hash
        ]);

        return redirect('/login')->with('success', 'Akun berhasil dibuat! Silakan Login.');
    }

    // Memproses login
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // Cek kecocokan email dan password
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect('/admin'); // Jika benar, masuk ke admin
        }

        // Jika salah, kembalikan dengan error
        return back()->withErrors(['email' => 'Email atau Password salah!']);
    }

    // Memproses logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect('/login');
    }
}