<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'brand',
        'model',
        'year',
        'color',
        'description',
        'category',
        'transmission',
        'fuel_type',
        'seats',
        'engine_cc',
        'mileage',
        'features',       // stored as JSON
        'image',
        'price_per_day',
        'deposit',
        'is_available',
        'is_featured',
    ];

    protected $casts = [
        'features'     => 'array',
        'is_available' => 'boolean',
        'is_featured'  => 'boolean',
        'price_per_day'=> 'decimal:2',
        'deposit'      => 'decimal:2',
    ];

    // Relationships
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    // Scopes
    public function scopeAvailable($query)
    {
        return $query->where('is_available', true);
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    // Helpers
    public function getImageUrlAttribute(): string
    {
        return $this->image
            ? asset('storage/' . $this->image)
            : asset('assets/images/car-placeholder.jpg');
    }

    public function hasFeature(string $feature): bool
    {
        return in_array($feature, $this->features ?? []);
    }
}
