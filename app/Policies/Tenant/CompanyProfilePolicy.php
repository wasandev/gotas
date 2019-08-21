<?php

namespace App\Policies\Tenant;

use App\Models\Tenant\User;
use App\Models\Tenant\CompanyProfile;
use Illuminate\Auth\Access\HandlesAuthorization;

class CompanyProfilePolicy
{
    use HandlesAuthorization;



    /**
     * Determine whether the user can view the company profile.
     *
     * @param  \App\Models\Tenant\User  $user
     * @param  \App\Models\Tenant\CompanyProfile  $companyProfile
     * @return mixed
     */
    public function view(User $user, CompanyProfile $companyProfile)
    {
        return $user->hasPermissionTo('view companyprofile');
    }

    /**
     * Determine whether the user can create company profiles.
     *
     * @param  \App\Models\Tenant\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create companyprofile');
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
        return $user->hasPermissionTo('edit companyprofile');
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
        return $user->hasPermissionTo('delete companyprofile');
    }
}
