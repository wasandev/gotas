<?php

namespace App\Observers;

use App\Models\Tenant\Address;

class AddressObserver
{
    public function creating(Address $address)
    {
        $address->user_id = auth()->user()->id;
    }

    public function saving(Address $address)
    {
        $address->user_id = auth()->user()->id;
    }
}
