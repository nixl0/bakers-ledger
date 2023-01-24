<?php

namespace App\Policies;

use App\Models\Goods;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class GoodsPolicy
{
    use HandlesAuthorization;

    public function create(User $user)
    {
        if (
            $user->role == User::IS_ADMIN ||
            $user->role == User::IS_MANAGER ||
            $user->role == User::IS_EDITOR
        ) {
            return Response::allow();
        }

        return Response::deny('Недостаточно прав.');
    }

    public function update(User $user, Goods $goods_instance)
    {
        if (
            $user->role == User::IS_ADMIN ||
            $user->role == User::IS_MANAGER ||
            $user->role == User::IS_EDITOR && (auth()->check() && $goods_instance->user_id === $user->id)
        ) {
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
