<?php

namespace App\Policies\Tenant;

use App\Models\Tenant\User;
use App\Models\Tenant\Branch_area;
use Illuminate\Auth\Access\HandlesAuthorization;

class BranchAreaPolicy
{
    use HandlesAuthorization;


    public function view(User $user, Branch_area $branch_area)
    {


        return $user->hasPermissionTo('view branch_areas');
    }


    public function create(User $user)
    {
        return $user->hasPermissionTo('create branch_areas');
    }


    public function update(User $user, Branch_area $branch)
    {

        return $user->hasPermissionTo('edit branch_areas');
    }


    public function delete(User $user, Branch_area $branch)
    {
        return $user->hasPermissionTo('delete branch_areas');
    }
}
