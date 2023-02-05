<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'brand',
        'model',
        'year',
        'body_type',
        'volume',
        'transmission',
    ];

    public function cars()
    {
        return $this->belongsToMany(Order::class, 'car_orders');
    }
}
