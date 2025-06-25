<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meja extends Model
{
    use HasFactory;

    // Tambahkan ini
    public static $statusOptions = [
        'tersedia' => 'Tersedia',
        'terpesan' => 'Terpesan',
        'digunakan' => 'Sedang Digunakan',
        'maintenance' => 'Maintenance'
    ];

    protected $table = 'meja';

    protected $fillable = [
        'nama',
        'kapasitas',
        'lokasi',
        'status',
        'foto',
        'deskripsi'
    ];

    public function getFotoUrlAttribute()
    {
        return $this->foto ? asset('storage/' . $this->foto) : null;
    }
}