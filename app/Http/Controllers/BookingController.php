<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Meja;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function history()
    {
        $bookings = Booking::with('meja') // Pastikan relasi 'meja' ada di model Booking
            ->where('user_id', auth()->id())
            ->orderBy('booking_date', 'desc')
            ->get();

        return view('Public.riwayat', compact('bookings'));
    }

    public function show($id)
    {
        $meja = Meja::findOrFail($id);
        return view('Public.booking', compact('meja'));
    }

    public function create($id)
    {
        $meja = Meja::findOrFail($id);
        return view('Public.booking', compact('meja'));
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'meja_id' => 'required|exists:mejas,id',
            'booking_date' => 'required|date|after_or_equal:today',
            'start_time' => 'required',
            'end_time' => 'required|after:start_time',
            'total_payment' => 'required|numeric|min:0'
        ]);

        $booking = new Booking();
        $booking->user_id = Auth::id();
        $booking->meja_id = $validated['meja_id'];
        $booking->booking_date = $validated['booking_date'];
        $booking->start_time = $validated['start_time'];
        $booking->end_time = $validated['end_time'];
        $booking->total_payment = $validated['total_payment'];
        $booking->status = 'pending'; // atau status default lainnya
        $booking->save();

        return redirect()->route('Booking.riwayat')->with('success', 'Booking berhasil dibuat');
    }
}