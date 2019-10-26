<?php

namespace App\Policies\Tenant;

use App\Models\Tenant\User;
use App\Models\Tenant\Product_style;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProductStylePolicy
{
    use HandlesAuthorization;


    public function view(User $user, Product_style $product_style)
    {
        return $user->hasPermissionTo('view productstyles');
    }


    public function create(User $user)
    {
        return $user->hasPermissionTo('create productstyles');
    }


    public function update(User $user, Product_style $product_style)
    {

        return $user->hasPermissionTo('edit productstyles');
    }


    public function delete(User $user, Product_style $product_style)
    {
        return $user->hasPermissionTo('delete productstyles');
    }
}
