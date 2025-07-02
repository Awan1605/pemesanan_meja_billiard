<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    // BookingController.php
    public function history()
    {
        $bookings = Booking::with('table')
            ->where('user_id', auth()->id())
            ->orderBy('booking_date', 'desc')
            ->get();

        return view('Public.riwayat', compact('bookings'));
    }

    public function create()
    {
        return view('Public.booking');
    }

}