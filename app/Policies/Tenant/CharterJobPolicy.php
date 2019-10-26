<?php

namespace App\Policies\Tenant;

use App\Models\Tenant\Charter_job;
use App\Models\Tenant\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CharterJobPolicy
{
    use HandlesAuthorization;


    public function view(User $user, Charter_job $charter_job)
    {
        return $user->hasPermissionTo('view charter_jobs');
    }


    public function create(User $user)
    {
        return $user->hasPermissionTo('create charter_jobs');
    }


    public function update(User $user, Charter_job $charter_job)
    {

        return $user->hasPermissionTo('edit charter_jobs');
    }


    public function delete(User $user, Charter_job $charter_job)
    {
        return $user->hasPermissionTo('delete charter_jobs');
    }
}
