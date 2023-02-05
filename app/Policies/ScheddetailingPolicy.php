<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ScheddetailingPolicy
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

    public function edit(User $user): bool
    {
        return $user->role === User::ROLE_ADMIN;
    }

    public function delete(User $user): bool
    {
        return $user->role === User::ROLE_ADMIN;
    }

    public function show(User $user): bool
    {
        return $user->role === User::ROLE_ADMIN;
    }
}
