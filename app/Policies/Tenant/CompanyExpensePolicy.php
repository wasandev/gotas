<?php

namespace App\Policies\Tenant;

use App\Models\Tenant\Company_expense;
use App\Models\Tenant\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CompanyExpensePolicy
{
    use HandlesAuthorization;


    public function view(User $user, Company_expense $company_expense)
    {
        return $user->hasPermissionTo('view company_expenses');
    }


    public function create(User $user)
    {
        return $user->hasPermissionTo('create company_expenses');
    }


    public function update(User $user, Company_expense $company_expense)
    {

        return $user->hasPermissionTo('edit company_expenses');
    }


    public function delete(User $user, Company_expense $company_expense)
    {
        return $user->hasPermissionTo('delete compant_expenses');
    }
}
