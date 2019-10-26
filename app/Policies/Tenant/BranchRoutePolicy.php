<?php

namespace App\Policies\Tenant;

use App\Models\Tenant\Branch_route;
use App\Models\Tenant\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BranchRoutePolicy
{
    use HandlesAuthorization;


    public function view(User $user, Branch_route $branch_route)
    {
        return $user->hasPermissionTo('view branch_routes');
    }


    public function create(User $user)
    {
        return $user->hasPermissionTo('create branch_routes');
    }


    public function update(User $user, Branch_route $branch_route)
    {

        return $user->hasPermissionTo('edit branch_routes');
    }


    public function delete(User $user, Branch_route $branch_route)
    {
        return $user->hasPermissionTo('delete branch_routes');
    }
}
