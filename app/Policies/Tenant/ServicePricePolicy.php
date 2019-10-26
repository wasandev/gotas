<?php

namespace App\Policies\Tenant;

use App\Models\Tenant\User;
use App\Models\Tenant\Serviceprice;
use Illuminate\Auth\Access\HandlesAuthorization;

class ServicePricePolicy
{
    use HandlesAuthorization;


    public function view(User $user, Serviceprice $serviceprice)
    {
        return $user->hasPermissionTo('view service_prices');
    }


    public function create(User $user)
    {
        return $user->hasPermissionTo('create service_prices');
    }


    public function update(User $user, Serviceprice $serviceprice)
    {

        return $user->hasPermissionTo('edit service_prices');
    }


    public function delete(User $user, Serviceprice $serviceprice)
    {
        return $user->hasPermissionTo('delete service_prices');
    }
}
