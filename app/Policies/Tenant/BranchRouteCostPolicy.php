<?php

namespace App\Policies\Tenant;

use App\Models\Tenant\Branch_route_cost;
use App\Models\Tenant\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BranchRouteCostPolicy
{
    use HandlesAuthorization;


    public function view(User $user, Branch_route_cost $branch_route_cost)
    {
        return $user->hasPermissionTo('view branche_route_costs');
    }


    public function create(User $user)
    {
        return $user->hasPermissionTo('create branche_route_costs');
    }


    public function update(User $user, Branch_route_cost $branch_route_cost)
    {

        return $user->hasPermissionTo('edit branche_route_costs');
    }


    public function delete(User $user, Branch_route_cost $branch_route_cost)
    {
        return $user->hasPermissionTo('delete branche_route_costs');
    }
}
