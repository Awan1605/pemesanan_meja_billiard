<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class PenggunaController extends Controller
{
    public function index()
    {
        $pengguna = Pengguna::orderBy('nama')->paginate(10);
        return view('pengguna', compact('pengguna'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:pengguna',
            'role' => 'required|in:pengguna,admin,kasir',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $pengguna = Pengguna::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'role' => $request->role ?? 'user',
            'password' => Hash::make($request->password),
            'status' => $request->status ? 'active' : 'inactive',
        ]);

        return redirect()->route('users.index')->with('success', 'Pengguna berhasil ditambahkan.');
    }

    public function update(Request $request, Pengguna $pengguna)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:pengguna,email,'.$pengguna->id,
            'role' => 'required|in:admin,owner,kasir',
        ]);

        $pengguna->update([
            'nama' => $request->nama,
            'email' => $request->email,
            'role' => $request->role,
        ]);

        return redirect()->route('users.index')->with('success', 'Pengguna berhasil diperbarui.');
    }

    public function destroy(Pengguna $pengguna)
    {
        $pengguna->delete();
        return redirect()->route('users.index')->with('success', 'Pengguna berhasil dihapus.');
    }

    public function toggleStatus(Pengguna $pengguna)
    {
        $pengguna->update([
            'status' => $pengguna->status === 'active' ? 'inactive' : 'active'
        ]);

        return response()->json(['status' => $pengguna->status]);
    }
}