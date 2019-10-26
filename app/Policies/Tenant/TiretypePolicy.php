<?php

namespace App\Policies\Tenant;

use App\Models\Tenant\User;
use App\Models\Tenant\Tiretype;
use Illuminate\Auth\Access\HandlesAuthorization;

class TiretypePolicy
{
    use HandlesAuthorization;


    public function view(User $user, Tiretype $tiretype)
    {
        return $user->hasPermissionTo('view tiretypes');
    }


    public function create(User $user)
    {
        return $user->hasPermissionTo('create tiretypes');
    }


    public function update(User $user, Tiretype $tiretype)
    {

        return $user->hasPermissionTo('edit tiretypes');
    }


    public function delete(User $user, Tiretype $tiretype)
    {
        return $user->hasPermissionTo('delete tiretypes');
    }
}
