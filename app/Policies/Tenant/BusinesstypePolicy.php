<?php

namespace App\Policies\Tenant;

use App\Model\Tenant\User;
use App\Model\Tenant\Businesstype;
use Illuminate\Auth\Access\HandlesAuthorization;

class BusinesstypePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the businesstype.
     *
     * @param  \App\User  $user
     * @param  \App\Businesstype  $businesstype
     * @return mixed
     */
    public function view(User $user, Businesstype $businesstype)
    {
        return true;
    }

    public function viewAny(User $user)
    {

        return $user->role == 'admin' || $user->role == 'employee';
    }
    /**
     * Determine whether the user can create businesstypes.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->role == 'admin';
    }

    /**
     * Determine whether the user can update the businesstype.
     *
     * @param  \App\User  $user
     * @param  \App\Businesstype  $businesstype
     * @return mixed
     */
    public function update(User $user, Businesstype $businesstype)
    {
        return $user->role == 'admin';
    }

    /**
     * Determine whether the user can delete the businesstype.
     *
     * @param  \App\User  $user
     * @param  \App\Businesstype  $businesstype
     * @return mixed
     */
    public function delete(User $user, Businesstype $businesstype)
    {
        return $user->role == 'admin';
    }

    /**
     * Determine whether the user can restore the businesstype.
     *
     * @param  \App\User  $user
     * @param  \App\Businesstype  $businesstype
     * @return mixed
     */
    public function restore(User $user, Businesstype $businesstype)
    {
        return $user->role == 'admin';
    }

    /**
     * Determine whether the user can permanently delete the businesstype.
     *
     * @param  \App\User  $user
     * @param  \App\Businesstype  $businesstype
     * @return mixed
     */
    public function forceDelete(User $user, Businesstype $businesstype)
    {
        return $user->role == 'admin';
    }
}
