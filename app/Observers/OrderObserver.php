<?php

namespace App\Observers;

use App\Jobs\EditDataOrderEmail;
use App\Models\Order;

class OrderObserver
{
    public function updated(Order $order)
    {
        if ($order->status !== $order->getOriginal('status')) {
            EditDataOrderEmail::dispatch($order);
        }
    }
}
