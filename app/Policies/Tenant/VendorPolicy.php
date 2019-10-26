<?php

namespace App\Policies\Tenant;

use App\Models\Tenant\Vendor;
use App\Models\Tenant\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class VendorPolicy
{
    use HandlesAuthorization;


    public function view(User $user, Vendor $vendor)
    {
        return $user->hasPermissionTo('view vendors');
    }


    public function create(User $user)
    {
        return $user->hasPermissionTo('create vendors');
    }


    public function update(User $user, Vendor $vendor)
    {

        return $user->hasPermissionTo('edit vendors');
    }


    public function delete(User $user, Vendor $vendor)
    {
        return $user->hasPermissionTo('delete vendors');
    }
}
