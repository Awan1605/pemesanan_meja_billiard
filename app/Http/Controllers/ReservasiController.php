<?php

namespace App\Http\Controllers;

use App\Models\Meja;
use Illuminate\Http\Request;

class ReservasiController extends Controller
{
    public function index()
    {
        $exclusiveTables = Meja::where('tipe', 'exclusive')->get();
        $classicTables = Meja::where('tipe', 'classic')->get();

        return view('Public.reservasi', compact('exclusiveTables', 'classicTables'));
    }
}