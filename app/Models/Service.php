<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'price',
        'time_work',
    ];

    public function orders()
    {
        return $this->belongsToMany(Order::class, 'order_services');
    }
}
