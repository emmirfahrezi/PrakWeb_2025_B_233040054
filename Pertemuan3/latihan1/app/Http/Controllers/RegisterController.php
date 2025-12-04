<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    // MODUL 2-2 START - Autentikasi Manual Sederhana
    public function showRegistrationForm()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        // Validasi input
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Generate a unique username from the name (fallback to email prefix)
        $base = Str::slug($request->name ?: explode('@', $request->email)[0]);
        $username = $base ?: 'user';
        $suffix = 0;
        while (User::where('username', $username)->exists()) {
            $suffix++;
            $username = $base . ($suffix ? '-' . $suffix : '');
        }

        // Logic register: validasi, hash password, User::create
        User::create([
            'name'     => $request->name,
            'username' => $username,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Redirect ke login setelah register berhasil
        return redirect('/login')->with('success', 'Registrasi berhasil! Silakan login.');
    }
    // MODUL 2-2 END
}
