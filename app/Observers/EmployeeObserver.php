<?php

namespace App\Observers;

use App\Models\Tenant\Employee;

class EmployeeObserver
{


    /**
     * Handle the retailer "creating" event.
     *
     * @param  \App\Employee  $employee
     * @return void
     */
    public function creating(Employee $employee)
    {
        $employee->user_id = auth()->user()->id;
        $employee->country = 'thailand';
    }

    /**
     * Handle the retailer "created" event.
     *
     * @param  \App\Employee  $employee
     * @return void
     */
    public function created(Employee $employee)
    {
        //
    }
    /**
     * Handle the retailer "updated" event.
     *
     * @param  \App\Employee  $employee
     * @return void
     */
    public function updated(Employee $employee)
    {
        //
    }

    /**
     * Handle the retailer "deleted" event.
     *
     * @param  \App\Employee  $employee
     * @return void
     */
    public function deleted(Employee $employee)
    {
        //
    }

    /**
     * Handle the retailer "restored" event.
     *
     * @param  \App\Employee  $employee
     * @return void
     */
    public function restored(Employee $employee)
    {
        //
    }

    /**
     * Handle the retailer "force deleted" event.
     *
     * @param  \App\Employee  $employee
     * @return void
     */
    public function forceDeleted(Employee $employee)
    {
        //
    }
}
