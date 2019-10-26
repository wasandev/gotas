<?php

namespace App\Policies\Tenant;

use App\Models\Tenant\User;
use App\Models\Tenant\Routeto_branch_cost;
use Illuminate\Auth\Access\HandlesAuthorization;

class RoutetoBranchCostPolicy
{
    use HandlesAuthorization;


    public function view(User $user, Routeto_branch_cost $routeto_branch_cost)
    {
        return $user->hasPermissionTo('view routeto_branche_costs');
    }


    public function create(User $user)
    {
        return $user->hasPermissionTo('create routeto_branche_costs');
    }


    public function update(User $user, Routeto_branch_cost $routeto_branch_cost)
    {

        return $user->hasPermissionTo('edit routeto_branche_costs');
    }


    public function delete(User $user, Routeto_branch_cost $routeto_branch_cost)
    {
        return $user->hasPermissionTo('delete routeto_branche_costs');
    }
}
