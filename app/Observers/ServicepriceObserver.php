<?php

namespace App\Observers;

use App\Models\Tenant\Serviceprice;

class ServicepriceObserver
{
    public function creating(Serviceprice $serviceprice)
    {
        $serviceprice->user_id = auth()->user()->id;
        $serviceprice->status = '1';
    }

    public function saving(Serviceprice $serviceprice)
    {
        $serviceprice->user_id = auth()->user()->id;
        $serviceprice->status = '1';
    }
}
