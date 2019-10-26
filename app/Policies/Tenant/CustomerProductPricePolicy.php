<?php

namespace App\Policies\Tenant;

use App\Models\Tenant\User;
use App\Models\Tenant\Customer_product_price;
use Illuminate\Auth\Access\HandlesAuthorization;

class CustomerProductPricePolicy
{
    use HandlesAuthorization;


    public function view(User $user, Customer_product_price $customer_product_price)
    {
        return $user->hasPermissionTo('view customerproduct_prices');
    }


    public function create(User $user)
    {
        return $user->hasPermissionTo('create customerproduct_prices');
    }


    public function update(User $user, Customer_product_price $customer_product_price)
    {

        return $user->hasPermissionTo('edit customerproduct_prices');
    }


    public function delete(User $user, Customer_product_price $customer_product_price)
    {
        return $user->hasPermissionTo('delete customerproduct_prices');
    }
}
