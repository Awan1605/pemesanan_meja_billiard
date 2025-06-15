<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PenggunaController extends Controller
{
    /**
     * Menampilkan daftar semua pengguna (Admin Panel).
     */
    public function index()
    {
        $pengguna = Pengguna::all();
        return view('admin.pengguna', compact('pengguna'));
    }

    /**
     * Menampilkan form registrasi untuk pengguna umum.
     */
    public function showRegistrationForm()
    {
        return view('Public.register'); // Pastikan file resources/views/Public/register.blade.php ada
    }

    /**
     * Menangani pendaftaran pengguna baru (umum).
     */
    public function register(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'username' => 'required|string|max:50|unique:pengguna,username',
            'email' => 'required|email|unique:pengguna,email',
            'password' => 'required|string|min:6',
            'nomor_telepon' => 'nullable|string|max:20',
        ]);

        Pengguna::create([
            'nama' => $request->nama,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'nomor_telepon' => $request->nomor_telepon,
            'role' => 'pengguna', // Default role
        ]);

        return redirect()->route('login')->with('success', 'Akun berhasil didaftarkan!');
    }

    /**
     * Menyimpan pengguna baru (Admin Tambah Manual).
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'username' => 'required|string|max:50|unique:pengguna,username',
            'email' => 'required|email|unique:pengguna,email',
            'password' => 'required|string|min:6',
            'nomor_telepon' => 'nullable|string|max:20',
            'role' => 'required|string',
        ]);

        Pengguna::create([
            'nama' => $request->nama,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'nomor_telepon' => $request->nomor_telepon,
            'role' => $request->role,
        ]);

        return redirect()->route('admin.pengguna')->with('success', 'Pengguna berhasil ditambahkan.');
    }

    /**
     * Memperbarui data pengguna.
     */
    public function update(Request $request, $id)
    {
        $pengguna = Pengguna::findOrFail($id);

        $request->validate([
            'nama' => 'required|string|max:100',
            'username' => 'required|string|max:50|unique:pengguna,username,' . $pengguna->id,
            'email' => 'required|email|unique:pengguna,email,' . $pengguna->id,
            'password' => 'nullable|string|min:6',
            'nomor_telepon' => 'nullable|string|max:20',
            'role' => 'required|string',
        ]);

        $pengguna->update([
            'nama' => $request->nama,
            'username' => $request->username,
            'email' => $request->email,
            'password' => $request->filled('password')
                ? Hash::make($request->password)
                : $pengguna->password,
            'nomor_telepon' => $request->nomor_telepon,
            'role' => $request->role,
        ]);

        return redirect()->route('admin.pengguna')->with('success', 'Pengguna berhasil diperbarui.');
    }

    /**
     * Menghapus pengguna.
     */
    public function destroy($id)
    {
        $pengguna = Pengguna::findOrFail($id);
        $pengguna->delete();

        return redirect()->route('admin.pengguna')->with('success', 'Pengguna berhasil dihapus.');
    }
}
