<?php

namespace App\Policies\Tenant;

use App\Models\Tenant\User;
use App\Models\Tenant\Carstyle;
use Illuminate\Auth\Access\HandlesAuthorization;

class CarstylePolicy
{
    use HandlesAuthorization;


    public function view(User $user, Carstyle $carstyle)
    {
        return $user->hasPermissionTo('view carstyles');
    }


    public function create(User $user)
    {
        return $user->hasPermissionTo('create carstyles');
    }


    public function update(User $user, Carstyle $carstyle)
    {

        return $user->hasPermissionTo('edit carstyles');
    }


    public function delete(User $user, Carstyle $carstyle)
    {
        return $user->hasPermissionTo('delete carstyles');
    }
}
