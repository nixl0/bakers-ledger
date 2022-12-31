<?php

namespace App\Policies;

use App\Models\Delivery;
use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Auth\Access\HandlesAuthorization;

class DeliveryPolicy
{
    use HandlesAuthorization;

    public function create(User $user)
    {
        if (
            $user->role == User::IS_ADMIN ||
            $user->role == User::IS_MANAGER ||
            $user->role == User::IS_DELIVERER
        ) {
            return Response::allow();
        }

        return Response::deny('Недостаточно прав.');
    }

    public function update(User $user, Delivery $delivery)
    {
        if (
            $user->role == User::IS_ADMIN ||
            $user->role == User::IS_MANAGER ||
            $user->role == User::IS_DELIVERER  && (auth()->check() && $delivery->user_id === $user->id)) {
            return Response::allow();
        }

        return Response::deny('Недостаточно прав.');
    }

    public function delete(User $user)
    {
        if (
            $user->role == User::IS_ADMIN ||
            $user->role == User::IS_MANAGER
        ) {
            return Response::allow();
        }

        return Response::deny('Недостаточно прав.');
    }
}
