<?php

namespace App\Policies\Tenant;

use App\Models\Tenant\User;
use \Pktharindu\NovaPermissions\Role;
use Illuminate\Auth\Access\HandlesAuthorization;

class RolePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any roles.
     *
     * @param  \App\Models\System\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->role == 'admin' || $user->hasPermissionTo('view roles');
    }

    /**
     * Determine whether the user can view the role.
     *
     * @param  \App\Models\System\User  $user
     * @param  \App\Role  $role
     * @return mixed
     */
    public function view(User $user, Role $role)
    {
        return $user->role == 'admin' || $user->hasPermissionTo('view roles');
    }

    /**
     * Determine whether the user can create roles.
     *
     * @param  \App\Models\System\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->role == 'admin' || $user->hasPermissionTo('create roles');
    }

    /**
     * Determine whether the user can update the role.
     *
     * @param  \App\Models\System\User  $user
     * @param  \App\Role  $role
     * @return mixed
     */
    public function update(User $user, Role $role)
    {
        return $user->role == 'admin' || $user->hasPermissionTo('edit roles');
    }

    /**
     * Determine whether the user can delete the role.
     *
     * @param  \App\Models\System\User  $user
     * @param  \App\Role  $role
     * @return mixed
     */
    public function delete(User $user, Role $role)
    {
        return $user->role == 'admin' || $user->hasPermissionTo('delete roles');
    }
}
