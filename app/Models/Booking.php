<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'car_name',
        'car_type',
        'pickup_date',
        'return_date',
        'pickup_location',
        'total_price',
        'status',
        'notes',
    ];

    protected $casts = [
        'pickup_date' => 'date',
        'return_date' => 'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
