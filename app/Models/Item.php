<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'height',
        'length',
        'width',
        'price',
        'count',
    ];

    public function orders()
    {
        return $this->belongsToMany(Order::class, 'item_orders');
    }
}
