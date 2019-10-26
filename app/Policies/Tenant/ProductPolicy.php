<?php

namespace App\Policies\Tenant;

use App\Models\Tenant\User;
use App\Models\Tenant\Product;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProductPolicy
{
    use HandlesAuthorization;


    public function view(User $user, Product $product)
    {
        return $user->hasPermissionTo('view products');
    }


    public function create(User $user)
    {
        return $user->hasPermissionTo('create products');
    }


    public function update(User $user, Product $product)
    {

        return $user->hasPermissionTo('edit products');
    }


    public function delete(User $user, Product $product)
    {
        return $user->hasPermissionTo('delete products');
    }
}
