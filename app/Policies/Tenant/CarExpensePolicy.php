<?php

namespace App\Policies\Tenant;

use App\Models\Tenant\Car_expense;
use App\Models\Tenant\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CarExpensePolicy
{
    use HandlesAuthorization;


    public function view(User $user, Car_expense $car_expense)
    {
        return $user->hasPermissionTo('view car_expenses');
    }


    public function create(User $user)
    {
        return $user->hasPermissionTo('create car_expenses');
    }


    public function update(User $user, Car_expense $car_expense)
    {

        return $user->hasPermissionTo('edit car_expenses');
    }


    public function delete(User $user, Car_expense $car_expense)
    {
        return $user->hasPermissionTo('delete car_expenses');
    }
}
