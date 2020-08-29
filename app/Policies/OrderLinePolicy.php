<?php

namespace App\Policies;

use App\Order;
use App\OrderLine;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class OrderLinePolicy
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

    public function edit(User $user, OrderLine $orderLine)
    {
        return false;
    }
}
