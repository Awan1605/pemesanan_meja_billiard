<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
    {
    public function dashboard()
    {
        return view('admin.dashboard');
    }
    public function reservasi()
    {
        return view('reservasi');
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
    public function about()
    {
        return view('about');
    }
    public function about2()
    {
        return view('about2');
    }
    public function home()
    {
        return view('home');
    }
    public function login()
    {
        return view('login');
    }
    public function registration()
    {
        return view('registration');
    }

}
