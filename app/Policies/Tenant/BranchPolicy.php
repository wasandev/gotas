<?php

namespace App\Policies\Tenant;

use App\Models\Tenant\User;
use App\Models\Tenant\Branch;
use Illuminate\Auth\Access\HandlesAuthorization;

class BranchPolicy
{
    use HandlesAuthorization;



    /**
     * Determine whether the user can view the company profile.
     *
     * @param  \App\Models\Tenant\User  $user
     * @param  \App\Models\Tenant\Branch  $branch
     * @return mixed
     */
    public function view(User $user, Branch $branch)
    {


        return $user->hasPermissionTo('view branches');
    }

    /**
     * Determine whether the user can create company profiles.
     *
     * @param  \App\Models\Tenant\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create branches');
    }

    /**
     * Determine whether the user can update the company profile.
     *
     * @param  \App\Models\Tenant\User  $user
     * @param  \App\Models\Tenant\Branch  $branch
     * @return mixed
     */
    public function update(User $user, Branch $branch)
    {

        return $user->hasPermissionTo('edit branches');
    }

    /**
     * Determine whether the user can delete the company profile.
     *
     * @param  \App\Models\Tenant\User  $user
     * @param  \App\Models\Tenant\Branch  $branch
     * @return mixed
     */
    public function delete(User $user, Branch $branch)
    {
        return $user->hasPermissionTo('delete branches');
    }
}
