<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
     // Tampilkan form register
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    // Proses form register
    public function register(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
        ]);

        // Buat user baru dengan role admin
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'admin', // pastikan tabel users punya kolom 'role'
        ]);

        // Langsung login
        Auth::login($user);

        return redirect()->route('admin.dashboard')->with('success', 'Registrasi berhasil!');
    }
}
