<?php

namespace App\Policies\API;

use App\Models\Gold;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class GoldPolicy
{
    /**
     * Create a new policy instance.
     */
    public function modify(User $user, Gold $gold): Response
    {
        return $user->id === $gold->seller_id
            ? Response::allow()
            : Response::deny('You do not own this lot.');
    }
}
