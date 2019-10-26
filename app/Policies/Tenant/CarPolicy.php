<?php

namespace App\Policies\Tenant;

use App\Models\Tenant\User;
use App\Models\Tenant\Car;
use Illuminate\Auth\Access\HandlesAuthorization;

class CarPolicy
{
    use HandlesAuthorization;


    public function view(User $user, Car $car)
    {
        return $user->hasPermissionTo('view cars');
    }


    public function create(User $user)
    {
        return $user->hasPermissionTo('create cars');
    }


    public function update(User $user, Car $car)
    {

        return $user->hasPermissionTo('edit cars');
    }


    public function delete(User $user, Car $car)
    {
        return $user->hasPermissionTo('delete cars');
    }
}
