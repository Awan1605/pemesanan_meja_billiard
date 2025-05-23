<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Pengguna extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'pengguna';

    protected $fillable = [
        'username',
        'email',
        'password',
        'nomor_telepon',
        'role',
        'dibuat_pada'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'dibuat_pada' => 'datetime'
    ];

    public function isAdmin()
    {
        return $this->role === 'admin';
    }
}