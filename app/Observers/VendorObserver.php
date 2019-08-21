<?php

namespace App\Observers;

use App\Models\Tenant\Vendor;

class VendorObserver
{
    public function creating(Vendor $vendor)
    {
        $vendor->user_id = auth()->user()->id;
    }

    public function saving(Vendor $vendor)
    {
        $vendor->user_id = auth()->user()->id;
    }
}
