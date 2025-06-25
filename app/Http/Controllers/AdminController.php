<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use Illuminate\Http\Request;
use App\Models\Meja;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function reservasi()
    {
        return view('admin.reservasi');
    }

    public function pengguna()
    {
        // ✅ Tambahkan ini agar variabel $pengguna tersedia di view
        $pengguna = Pengguna::all();
        return view('admin.pengguna', compact('pengguna'));
    }

    // Pastikan ini ada

    public function meja()
    {
        $meja = Meja::paginate(10);
        return view('admin.meja', compact('meja'));
    }

    public function pembayaran()
    {
        return view('admin.pembayaran');
    }

    public function makanan()
    {
        return view('admin.makanan');
    }
}
