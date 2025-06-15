<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use Illuminate\Http\Request;

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

    public function meja()
    {
        return view('admin.meja');
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
