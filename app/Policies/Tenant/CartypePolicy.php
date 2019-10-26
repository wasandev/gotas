<?php

namespace App\Policies\Tenant;

use App\Models\Tenant\User;
use App\Models\Tenant\Cartype;
use Illuminate\Auth\Access\HandlesAuthorization;

class CartypePolicy
{
    use HandlesAuthorization;


    public function view(User $user, Cartype $cartype)
    {
        return $user->hasPermissionTo('view cartypes');
    }


    public function create(User $user)
    {
        return $user->hasPermissionTo('create cartypes');
    }


    public function update(User $user, Cartype $cartype)
    {

        return $user->hasPermissionTo('edit cartypes');
    }


    public function delete(User $user, Cartype $cartype)
    {
        return $user->hasPermissionTo('delete cartypes');
    }
}
