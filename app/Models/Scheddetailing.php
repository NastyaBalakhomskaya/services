<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scheddetailing extends Model
{
    use HasFactory;

    protected $fillable = [
        'date_record',
        'time_record',
    ];

    public function orders()
    {
        return $this->belongsToMany(Order::class, 'scheddetailing_orders');
    }
}
