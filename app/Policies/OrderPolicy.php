<?php

namespace App\Policies;

use App\Models\Order;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class OrderPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function create(User $user): bool
    {
        return $user->role === User::ROLE_ADMIN;
    }

    public function edit(User $user, Order $order): bool
    {
        return $user->id === $order->user_id;
    }

    public function delete(User $user, Order $order): bool
    {
        return $user->id === $order->user_id;
    }
}
