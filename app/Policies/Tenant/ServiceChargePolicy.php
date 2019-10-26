<?php

namespace App\Policies\Tenant;

use App\Models\Tenant\User;
use App\Models\Tenant\Service_charge;
use Illuminate\Auth\Access\HandlesAuthorization;

class ServiceChargePolicy
{
    use HandlesAuthorization;


    public function view(User $user, Service_charge $service_charge)
    {
        return $user->hasPermissionTo('view service_charges');
    }


    public function create(User $user)
    {
        return $user->hasPermissionTo('create service_charges');
    }


    public function update(User $user, Service_charge $service_charge)
    {

        return $user->hasPermissionTo('edit service_charges');
    }


    public function delete(User $user, Service_charge $service_charge)
    {
        return $user->hasPermissionTo('delete service_charges');
    }
}
