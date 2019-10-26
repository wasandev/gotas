<?php

namespace App\Policies\Tenant;

use App\Models\Tenant\User;
use App\Models\Tenant\Driving_license_type;
use Illuminate\Auth\Access\HandlesAuthorization;

class DrivingLicenseTypePolicy
{
    use HandlesAuthorization;


    public function view(User $user, Driving_license_type $driving_license_type)
    {
        return $user->hasPermissionTo('view driving_license_types');
    }


    public function create(User $user)
    {
        return $user->hasPermissionTo('create driving_license_types');
    }


    public function update(User $user, Driving_license_type $driving_license_type)
    {

        return $user->hasPermissionTo('edit driving_license_types');
    }


    public function delete(User $user, Driving_license_type $driving_license_type)
    {
        return $user->hasPermissionTo('delete driving_license_types');
    }
}
