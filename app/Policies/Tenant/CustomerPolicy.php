<?php

namespace App\Policies\Tenant;

use App\Models\Tenant\User;
use App\Models\Tenant\Customer;
use Illuminate\Auth\Access\HandlesAuthorization;

class CustomerPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any customers.
     *
     * @param  \App\Models\Tenant\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->role == 'admin' || $user->role == 'employee';
    }

    /**
     * Determine whether the user can view the customer.
     *
     * @param  \App\Models\Tenant\User  $user
     * @param  \App\Models\Tenant\Customer  $customer
     * @return mixed
     */
    public function view(User $user, Customer $customer)
    {
        return true;
    }

    /**
     * Determine whether the user can create customers.
     *
     * @param  \App\Models\Tenant\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->role == 'admin' || $user->role == 'employee';
    }

    /**
     * Determine whether the user can update the customer.
     *
     * @param  \App\Models\Tenant\User  $user
     * @param  \App\Models\Tenant\Customer  $customer
     * @return mixed
     */
    public function update(User $user, Customer $customer)
    {
        return $user->role == 'admin' || $user->role == 'employee';
    }

    /**
     * Determine whether the user can delete the customer.
     *
     * @param  \App\Models\Tenant\User  $user
     * @param  \App\Models\Tenant\Customer  $customer
     * @return mixed
     */
    public function delete(User $user, Customer $customer)
    {
        return $user->role == 'admin' || $user->role == 'employee';
    }

    /**
     * Determine whether the user can restore the customer.
     *
     * @param  \App\Models\Tenant\User  $user
     * @param  \App\Models\Tenant\Customer  $customer
     * @return mixed
     */
    public function restore(User $user, Customer $customer)
    {
        return $user->role == 'admin' || $user->role == 'employee';
    }

    /**
     * Determine whether the user can permanently delete the customer.
     *
     * @param  \App\Models\Tenant\User  $user
     * @param  \App\Models\Tenant\Customer  $customer
     * @return mixed
     */
    public function forceDelete(User $user, Customer $customer)
    {
        return $user->role == 'admin' || $user->role == 'employee';
    }
}
