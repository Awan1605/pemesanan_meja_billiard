<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Menampilkan halaman login
    public function showLoginForm()
    {
        return view('Public.login');
    }

    // Menangani proses login
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $pengguna = Pengguna::where('username', $request->username)->first();

        if (!$pengguna || !Hash::check($request->password, $pengguna->password)) {
            return back()->with('error', 'Username atau password salah.')->withInput();
        }

        $request->session()->put([
            'id' => $pengguna->id,
            'username' => $pengguna->username,
            'role' => $pengguna->role,
            'authenticated' => true
        ]);

        auth()->login($pengguna);

        // Redirect berdasarkan role
        switch ($pengguna->role) {
            case 'admin':
                return redirect()->intended(route('admin.dashboard'))
                    ->with('success', 'Selamat datang, ' . $pengguna->username . '!');
            default:
                return redirect()->intended(route('Public/lending_page'))
                    ->with('success', 'Login berhasil! Selamat datang kembali.');
        }
    }

    // Menangani proses logout
    public function destroy(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
