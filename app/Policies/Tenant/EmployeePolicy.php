<?php

namespace App\Policies\Tenant;

use App\Models\Tenant\User;
use App\Models\Tenant\Employee;
use Illuminate\Auth\Access\HandlesAuthorization;

class EmployeePolicy
{
    use HandlesAuthorization;

    public function view(User $user, Employee $employee)
    {
        return $user->hasPermissionTo('view employees');
    }


    public function create(User $user)
    {
        return $user->hasPermissionTo('create employees');
    }


    public function update(User $user, Employee $employee)
    {

        return $user->hasPermissionTo('edit employees');
    }


    public function delete(User $user, Employee $employee)
    {
        return $user->hasPermissionTo('delete employees');
    }
}
