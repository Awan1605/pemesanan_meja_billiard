<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Pengguna extends Authenticatable
{
    use HasFactory;

    protected $table = 'pengguna';

    protected $fillable = [
        'nama',
        'username',
        'email',
        'password',
        'nomor_telepon',
        'role',
        'dibuat_pada',
    ];

    protected $hidden = [
        'password',
    ];

    public $timestamps = true;
    // Di model Pengguna
    // Jika kolom 'dibuat_pada' adalah pengganti 'created_at'
    const CREATED_AT = 'dibuat_pada';
    const UPDATED_AT = null;
}
