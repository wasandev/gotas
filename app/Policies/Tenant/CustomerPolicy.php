<?php

namespace App\Policies\Tenant;

use App\Models\Tenant\User;
use App\Models\Tenant\Customer;
use Illuminate\Auth\Access\HandlesAuthorization;

class CustomerPolicy
{
    use HandlesAuthorization;

    public function view(User $user, Customer $customer)
    {
        return $user->hasPermissionTo('view customers');
    }


    public function create(User $user)
    {
        return $user->hasPermissionTo('create customers');
    }


    public function update(User $user, Customer $customer)
    {

        return $user->hasPermissionTo('edit customers');
    }


    public function delete(User $user, Customer $customer)
    {
        return $user->hasPermissionTo('delete customers');
    }
}
