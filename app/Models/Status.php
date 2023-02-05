<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
    ];

    public function orders()
    {
        return $this->belongsToMany(Order::class, 'status_orders');
    }

    /*public function shops()
    {
        return $this->belongsToMany(Shop::class, 'status_shops');
    }*/
}
