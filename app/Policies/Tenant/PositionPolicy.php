<?php

namespace App\Policies\Tenant;

use App\Models\Tenant\User;
use App\Models\Tenant\Position;
use Illuminate\Auth\Access\HandlesAuthorization;

class PositionPolicy
{
    use HandlesAuthorization;


    public function view(User $user, Position $position)
    {
        return $user->hasPermissionTo('view positions');
    }


    public function create(User $user)
    {
        return $user->hasPermissionTo('create positions');
    }


    public function update(User $user, Position $position)
    {

        return $user->hasPermissionTo('edit positions');
    }


    public function delete(User $user, Position $position)
    {
        return $user->hasPermissionTo('delete positions');
    }
}
