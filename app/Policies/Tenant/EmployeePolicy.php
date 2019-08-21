<?php

namespace App\Policies\Tenant;

use App\Models\Tenant\User;
use App\Models\Tenant\Employee;
use Illuminate\Auth\Access\HandlesAuthorization;

class EmployeePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any employees.
     *
     * @param  \App\Models\Tenant\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->role == 'admin' || $user->role == 'employee';
    }

    /**
     * Determine whether the user can view the employee.
     *
     * @param  \App\Models\Tenant\User  $user
     * @param  \App\Models\Tenant\Employee  $employee
     * @return mixed
     */
    public function view(User $user, Employee $employee)
    {
        return true;
    }

    /**
     * Determine whether the user can create employees.
     *
     * @param  \App\Models\System\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->role == 'admin' || $user->role == 'employee';
    }

    /**
     * Determine whether the user can update the employee.
     *
     * @param  \App\Models\System\User  $user
     * @param  \App\Models\Tenant\Employee  $employee
     * @return mixed
     */
    public function update(User $user, Employee $employee)
    {
        return $user->role == 'admin' || $user->role == 'employee';
    }

    /**
     * Determine whether the user can delete the employee.
     *
     * @param  \App\Models\Tenant\User  $user
     * @param  \App\Models\Tenant\Employee  $employee
     * @return mixed
     */
    public function delete(User $user, Employee $employee)
    {
        return $user->role == 'admin' || $user->role == 'employee';
    }

    /**
     * Determine whether the user can restore the employee.
     *
     * @param  \App\Models\Tenant\User  $user
     * @param  \App\Models\Tenant\Employee  $employee
     * @return mixed
     */
    public function restore(User $user, Employee $employee)
    {
        return $user->role == 'admin' || $user->role == 'employee';
    }

    /**
     * Determine whether the user can permanently delete the employee.
     *
     * @param  \App\Models\Tenant\User  $user
     * @param  \App\Models\Tenant\Employee  $employee
     * @return mixed
     */
    public function forceDelete(User $user, Employee $employee)
    {
        return $user->role == 'admin' || $user->role == 'employee';
    }
}
