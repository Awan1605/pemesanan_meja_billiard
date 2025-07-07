<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meja extends Model
{
    use HasFactory;
    protected $table = 'meja';

    /**
     * Daftar status meja yang tersedia.
     */
    protected $fillable = [
        'nama',
        'kapasitas',
        'lokasi',
        'tipe',
        'harga',
        'status',
        'foto',
        'deskripsi'
    ];

    public static $statusOptions = [
        'tersedia' => 'Tersedia',
        'terpesan' => 'Terpesan',
        'digunakan' => 'Sedang Digunakan',
        'maintenance' => 'Maintenance',
    ];

    public static $tipeOptions = [
        'exclusive' => 'Exclusive',
        'classic' => 'Classic',
    ];

}
