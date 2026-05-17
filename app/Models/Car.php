<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type',
        'brand',
        'year',
        'price_per_day',
        'seats',
        'transmission',
        'fuel_type',
        'image',
        'status',
        'description',
    ];
}
