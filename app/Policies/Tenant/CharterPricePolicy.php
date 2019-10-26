<?php

namespace App\Policies\Tenant;

use App\Models\Tenant\Charter_price;
use App\Models\Tenant\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CharterPricePolicy
{
    use HandlesAuthorization;


    public function view(User $user, Charter_price $charter_price)
    {
        return $user->hasPermissionTo('view charter_prices');
    }


    public function create(User $user)
    {
        return $user->hasPermissionTo('create charter_prices');
    }


    public function update(User $user, Charter_price $charter_price)
    {

        return $user->hasPermissionTo('edit charter_prices');
    }


    public function delete(User $user, Charter_price $charter_price)
    {
        return $user->hasPermissionTo('delete charter_prices');
    }
}
