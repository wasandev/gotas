<?php

namespace App\Policies\Tenant;

use App\Models\Tenant\User;

use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\Tenant\User  $user
     * @param  \App\Models\Tenant\User  $model
     * @return mixed
     */
    public function view(User $user, User $model)
    {
        return true;
    }

    public function viewAny(User $user)
    {
        return $user->role == 'admin' || $user->role == 'employee';
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\Tenant\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->role == 'admin';
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\Tenant\User  $user
     * @param  \App\Models\Tenant\User  $model
     * @return mixed
     */
    public function update(User $user, User $model)
    {

        return ($user->id == $model->id) || ($user->role == 'admin');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\Tenant\User  $user
     * @param  \App\Models\Tenant\User  $model
     * @return mixed
     */
    public function delete(User $user, User $model)
    {
        return $user->role == 'admin';
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\Tenant\User  $user
     * @param  \App\Models\Tenant\User  $model
     * @return mixed
     */
    public function restore(User $user, User $model)
    {
        return $user->role == 'admin';
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\Tenant\User  $user
     * @param  \App\Models\Tenant\User  $model
     * @return mixed
     */
    public function forceDelete(User $user, User $model)
    {
        return $user->role == 'admin';
    }
}
