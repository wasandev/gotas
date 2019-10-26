<?php

namespace App\Policies\Tenant;

use App\Models\Tenant\User;
use App\Models\Tenant\Department;
use Illuminate\Auth\Access\HandlesAuthorization;

class DepartmentPolicy
{
    use HandlesAuthorization;


    public function view(User $user, Department $department)
    {
        return $user->hasPermissionTo('view departments');
    }


    public function create(User $user)
    {
        return $user->hasPermissionTo('create departments');
    }


    public function update(User $user, Department $department)
    {

        return $user->hasPermissionTo('edit departments');
    }


    public function delete(User $user, Department $department)
    {
        return $user->hasPermissionTo('delete departments');
    }
}
