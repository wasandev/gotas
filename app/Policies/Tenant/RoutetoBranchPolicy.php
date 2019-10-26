<?php

namespace App\Policies\Tenant;

use App\Models\Tenant\User;
use App\Models\Tenant\Routeto_branch;
use Illuminate\Auth\Access\HandlesAuthorization;

class RoutetoBranchPolicy
{
    use HandlesAuthorization;


    public function view(User $user, Routeto_branch $routeto_branch)
    {
        return $user->hasPermissionTo('view routeto_branches');
    }


    public function create(User $user)
    {
        return $user->hasPermissionTo('create routeto_branches');
    }


    public function update(User $user, Routeto_branch $routeto_branch)
    {

        return $user->hasPermissionTo('edit routeto_branches');
    }


    public function delete(User $user, Routeto_branch $routeto_branch)
    {
        return $user->hasPermissionTo('delete routeto_branches');
    }
}
