<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Order;
use App\Models\User;

class OrderService
{
    public function create(array $data, User $user): Order
    {
        $order = new Order($data);
        $order->user()->associate($user);
        $order->save();
        $order->detailings()->attach($data['detailings']);
        $order->services()->attach($data['services']);
        $order->tires()->attach($data['tires']);
        $order->cars()->attach($data['cars']);

        return $order;
    }

    public function edit(Order $order, array $data): void
    {
        $order->fill($data);
        $order->detailings()->sync($data['detailings']);
        $order->services()->sync($data['services']);
        $order->tires()->sync($data['tires']);
        $order->cars()->sync($data['cars']);
        $order->save();
    }

    public function delete(Order $order): void
    {
        $order->delete();
    }
}
