<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Menampilkan halaman registrasi
    public function showRegistrationForm()
    {
        return view('registration');
    }

    // Menangani proses registrasi
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:pengguna,email',
            'phone' => 'required|string|max:15',
            'username' => 'required|string|unique:pengguna,username',
            'password' => 'required|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // Menyimpan pengguna baru
        $pengguna = new Pengguna();
        $pengguna->username = $request->username;
        $pengguna->email = $request->email;
        $pengguna->password = Hash::make($request->password); // Meng-hash password
        $pengguna->nomor_telepon = $request->phone;
        $pengguna->role = $request->role ?? 'user';;  // Ambil role dari input form
        $pengguna->dibuat_pada = now();
        $pengguna->save();


        return redirect()->route('login')->with('success', 'Registrasi berhasil! Silakan login.');
    }

    // Menampilkan halaman login
    public function showLoginForm()
    {
        return view('login');
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
                return redirect()->intended(route('admin.dashboard'));
            case 'kasir':
                return redirect()->intended(route('kasir.dashboard'));
            default:
                return redirect()->intended(route('about2'));
        }
    }


    // Menangani proses logout
    public function logout(Request $request)
    {
        Auth::logout();
        
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect('/');
    }
}
