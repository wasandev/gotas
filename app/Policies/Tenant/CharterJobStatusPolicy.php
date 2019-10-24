<?php

namespace App\Policies\Tenant;

use App\Models\Tenant\Charter_job_status;
use App\Models\Tenant\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CharterJobStatusPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any charter_job_statuses.
     *
     * @param  \App\Models\System\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view the charter_job_status.
     *
     * @param  \App\Models\System\User  $user
     * @param  \App\Charter_job_status  $charterJobStatus
     * @return mixed
     */
    public function view(User $user, Charter_job_status $charterJobStatus)
    {
        return true;
    }

    /**
     * Determine whether the user can create charter_job_statuses.
     *
     * @param  \App\Models\System\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->role == 'admin';
    }

    /**
     * Determine whether the user can update the charter_job_status.
     *
     * @param  \App\Models\System\User  $user
     * @param  \App\Charter_job_status  $charterJobStatus
     * @return mixed
     */
    public function update(User $user, Charter_job_status $charterJobStatus)
    {
        return false;
    }

    /**
     * Determine whether the user can delete the charter_job_status.
     *
     * @param  \App\Models\System\User  $user
     * @param  \App\Charter_job_status  $charterJobStatus
     * @return mixed
     */
    public function delete(User $user, Charter_job_status $charterJobStatus)
    {
        return false;
    }

    /**
     * Determine whether the user can restore the charter_job_status.
     *
     * @param  \App\Models\System\User  $user
     * @param  \App\Charter_job_status  $charterJobStatus
     * @return mixed
     */
    public function restore(User $user, Charter_job_status $charterJobStatus)
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the charter_job_status.
     *
     * @param  \App\Models\System\User  $user
     * @param  \App\Charter_job_status  $charterJobStatus
     * @return mixed
     */
    public function forceDelete(User $user, Charter_job_status $charterJobStatus)
    {
        return false;
    }
}
