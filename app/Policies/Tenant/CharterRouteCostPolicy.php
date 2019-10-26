<?php

namespace App\Policies\Tenant;

use App\Models\Tenant\Charter_route_cost;
use App\Models\Tenant\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CharterRouteCostPolicy
{
    use HandlesAuthorization;


    public function view(User $user, Charter_route_cost $charter_route_cost)
    {
        return $user->hasPermissionTo('view charter_route_costs');
    }


    public function create(User $user)
    {
        return $user->hasPermissionTo('create charter_route_costs');
    }


    public function update(User $user, Charter_route_cost $charter_route_cost)
    {

        return $user->hasPermissionTo('edit charter_route_costs');
    }


    public function delete(User $user, Charter_route_cost $charter_route_cost)
    {
        return $user->hasPermissionTo('delete charter_route_costs');
    }
}
