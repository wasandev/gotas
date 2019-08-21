<?php

namespace App\Observers;

use App\Models\Tenant\Car_expense;

class Car_expenseObserver
{
    public function creating(Car_expense $car_expense)
    {
        $car_expense->user_id = auth()->user()->id;
    }

    public function saving(Car_expense $car_expense)
    {
        $car_expense->user_id = auth()->user()->id;
    }
}
