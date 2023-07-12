<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminLoginController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Login berhasil, lakukan pengecekan apakah pengguna memiliki role "admin"
            if (Auth::user()->isAdmin()) {
                // Redirect ke halaman admin setelah login berhasil
                return redirect()->route('dashboard');
            } else {
                // Pengguna tidak memiliki role "admin", beri respons sesuai kebutuhan Anda
            }
        } else {
            // Login gagal, kembali ke halaman login dengan pesan error
            return redirect()->back()->withErrors([
                'email' => 'Invalid credentials.',
            ]);
        }
    }
    public function showLoginForm()
    {
        return view('admin.login');
    }
}
