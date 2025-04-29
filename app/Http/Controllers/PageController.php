<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
    {
    
    public function about()
    {
        return view('about');
    }

    public function lreservasi()
    {
        return view('lreservasi');
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
    public function booking(Request $request)
    {
        $meja = $request->meja;
        $tipe = $request->tipe;
        $lantai = $request->lantai;

        return view('booking', compact('meja', 'tipe', 'lantai'));
    }


}
