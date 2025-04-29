<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Metode untuk halaman admin
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
        return view('admin.pengguna');
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
