<?php

namespace App\Observers;

use App\Models\Tenant\Customer;

class CustomerObserver
{


    /**
     * Handle the retailer "creating" event.
     *
     * @param  \App\Customer  $customer
     * @return void
     */
    public function creating(Customer $customer)
    {
        $customer->user_id = auth()->user()->id;
        $customer->country = 'thailand';
        $customer->status = '1';
    }

    public function saving(Customer $customer)
    {
        $customer->user_id = auth()->user()->id;
        $customer->country = 'thailand';
        $customer->status = '1';
    }

    /**
     * Handle the retailer "created" event.
     *
     * @param  \App\Customer  $customer
     * @return void
     */
    public function created(Customer $customer)
    {
        //
    }
    /**
     * Handle the retailer "updated" event.
     *
     * @param  \App\Customer  $customer
     * @return void
     */
    public function updated(Customer $customer)
    {
        //
    }

    /**
     * Handle the retailer "deleted" event.
     *
     * @param  \App\Customer  $customer
     * @return void
     */
    public function deleted(Customer $customer)
    {
        //
    }

    /**
     * Handle the retailer "restored" event.
     *
     * @param  \App\Customer  $customer
     * @return void
     */
    public function restored(Customer $customer)
    {
        //
    }

    /**
     * Handle the retailer "force deleted" event.
     *
     * @param  \App\Customer  $customer
     * @return void
     */
    public function forceDeleted(Customer $customer)
    {
        //
    }
}
