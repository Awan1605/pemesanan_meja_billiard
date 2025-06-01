<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{

    public function lending_page()
    {
        return view('Public.lending_page');
    }

    public function booking1()
    {
        return view('Public.booking');
    }
    public function reservasi()
    {
        return view('Public.reservasi');
    }


    public function login()
    {
        return view('Public.login');
    }
    public function register()
    {
        return view('Public.register');
    }
    public function booking(Request $request)
    {
        $meja = $request->meja;
        $tipe = $request->tipe;
        $lantai = $request->lantai;

        return view('Public.booking', compact('meja', 'tipe', 'lantai'));
    }
    public function riwayat()
    {
        //Ini nanti untuk mengambil dari database
        // $riwayat = Booking::where('user_id', auth()->id())->get();

        return view('Public.riwayat');
    }



}
