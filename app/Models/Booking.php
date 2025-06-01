<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pengguna;
use App\Models\Table;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'table_id',
        'booking_date',
        'booking_time',
        'status',
        'total_amount',
        'notes'
    ];

    protected $casts = [
        'booking_date' => 'date',
    ];

    public function user()
    {
        return $this->belongsTo(Pengguna::class);
    }

    // public function table()
    // {
    //     return $this->belongsTo(Table::class);
    // }
}