<?php

namespace App\Policies\Tenant;

use App\Models\Tenant\Charter_route;
use App\Models\Tenant\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CharterRoutePolicy
{
    use HandlesAuthorization;


    public function view(User $user, Charter_route $charter_route)
    {
        return $user->hasPermissionTo('view charter_routes');
    }


    public function create(User $user)
    {
        return $user->hasPermissionTo('create charter_routes');
    }


    public function update(User $user, Charter_route $charter_route)
    {

        return $user->hasPermissionTo('edit charter_routes');
    }


    public function delete(User $user, Charter_route $charter_route)
    {
        return $user->hasPermissionTo('delete charter_routes');
    }
}
