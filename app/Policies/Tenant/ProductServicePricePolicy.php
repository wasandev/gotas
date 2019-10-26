<?php

namespace App\Policies\Tenant;

use App\Models\Tenant\User;
use App\Models\Tenant\Productservice_price;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProductServicePricePolicy
{
    use HandlesAuthorization;


    public function view(User $user, Productservice_price $productservice_price)
    {
        return $user->hasPermissionTo('view productservice_prices');
    }


    public function create(User $user)
    {
        return $user->hasPermissionTo('create productservice_prices');
    }


    public function update(User $user, Productservice_price $productservice_price)
    {

        return $user->hasPermissionTo('edit productservice_prices');
    }


    public function delete(User $user, Productservice_price $productservice_price)
    {
        return $user->hasPermissionTo('delete productservice_prices');
    }
}
