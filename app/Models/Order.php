<?php

namespace App\Models;

use App\Observers\OrderObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'contact_details',
        'date_start',
        'time_start',
        'text',
        'status',
        'datetime_finish',
        'price_sum',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public static function boot(): void
    {
        parent::boot();

        self::observe(OrderObserver::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function detailings()
    {
        return $this->belongsToMany(Detailing::class, 'detailing_orders');
    }

    public function services()
    {
        return $this->belongsToMany(Service::class, 'order_services');
    }

    public function tires()
    {
        return $this->belongsToMany(Tire::class, 'tire_orders');
    }

    public function cars()
    {
        return $this->belongsToMany(Car::class, 'car_orders');
    }
}
