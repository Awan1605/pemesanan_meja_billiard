@extends('layouts.app')

<div class="container mx-auto text-white px-4 py-6">
    <h1 class="text-2xl font-bold mb-4">Formulir Booking</h1>

    @if(isset($total_pembayaran))
        <div class="bg-green-800 p-4 rounded mb-4">
            <h3 class="text-lg font-bold">Detail Pemesanan:</h3>
            <p>Meja: {{ $meja }}</p>
            <p>Tipe: {{ $tipe }}</p>
            <p>Lantai: {{ $lantai }}</p>
            <p>Jumlah Jam Reservasi: {{ $jumlah_reservasi }} jam</p>
            <p>Waktu Reservasi: {{ $waktu }}</p>
            <p>Hari Reservasi: {{ $hari }}</p>
            <p class="font-bold">Total Pembayaran: Rp {{ number_format($total_pembayaran, 0, ',', '.') }}</p>
        </div>
    @endif

    <form method="POST" action="{{ url('/booking') }}">
        @csrf
        <input type="hidden" name="meja" value="{{ $meja }}">
        <input type="hidden" name="tipe" value="{{ $tipe }}">
        <input type="hidden" name="lantai" value="{{ $lantai }}">

        <div class="mb-4">
            <label for="jumlah_reservasi" class="block">Jumlah Jam Reservasi:</label>
            <input type="number" name="jumlah_reservasi" min="1" value="2" required class="text-black w-full px-2 py-1 rounded">
        </div>

        <div class="mb-4">
            <label for="waktu" class="block">Pilih Waktu:</label>
            <input type="time" name="waktu" required class="text-black w-full px-2 py-1 rounded">
        </div>

        <div class="mb-4">
            <label for="hari" class="block">Pilih Hari:</label>
            <input type="date" name="hari" required class="text-black w-full px-2 py-1 rounded">
        </div>

        <button type="submit" class="bg-blue-600 px-4 py-2 rounded text-white">Bayar Sekarang</button>
    </form>
</div>
