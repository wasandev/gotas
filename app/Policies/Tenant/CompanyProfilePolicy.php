<?php

namespace App\Policies\Tenant;

use App\Models\Tenant\User;
use App\Models\Tenant\CompanyProfile;
use Illuminate\Auth\Access\HandlesAuthorization;

class CompanyProfilePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any company profiles.
     *
     * @param  \App\Models\Tenant\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->role == 'admin' || $user->role == 'employee';
    }

    /**
     * Determine whether the user can view the company profile.
     *
     * @param  \App\Models\Tenant\User  $user
     * @param  \App\Models\Tenant\CompanyProfile  $companyProfile
     * @return mixed
     */
    public function view(User $user, CompanyProfile $companyProfile)
    {
        return true;
    }

    /**
     * Determine whether the user can create company profiles.
     *
     * @param  \App\Models\Tenant\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return false;
    }

    /**
     * Determine whether the user can update the company profile.
     *
     * @param  \App\Models\Tenant\User  $user
     * @param  \App\Models\Tenant\CompanyProfile  $companyProfile
     * @return mixed
     */
    public function update(User $user, CompanyProfile $companyProfile)
    {
        return $user->role == 'admin';
    }

    /**
     * Determine whether the user can delete the company profile.
     *
     * @param  \App\Models\Tenant\User  $user
     * @param  \App\Models\Tenant\CompanyProfile  $companyProfile
     * @return mixed
     */
    public function delete(User $user, CompanyProfile $companyProfile)
    {
        return false;
    }

    /**
     * Determine whether the user can restore the company profile.
     *
     * @param  \App\Models\Tenant\User  $user
     * @param  \App\Models\Tenant\CompanyProfile  $companyProfile
     * @return mixed
     */
    public function restore(User $user, CompanyProfile $companyProfile)
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the company profile.
     *
     * @param  \App\Models\Tenant\User  $user
     * @param  \App\Models\Tenant\CompanyProfile  $companyProfile
     * @return mixed
     */
    public function forceDelete(User $user, CompanyProfile $companyProfile)
    {
        return false;
    }
}
