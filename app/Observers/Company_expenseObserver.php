<?php

namespace App\Observers;

use App\Models\Tenant\Company_expense;

class Company_expenseObserver
{
    public function creating(Company_expense $company_expense)
    {
        $company_expense->user_id = auth()->user()->id;
    }

    public function saving(Company_expense $company_expense)
    {
        $company_expense->user_id = auth()->user()->id;
    }
}
