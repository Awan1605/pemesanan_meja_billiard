<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
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
