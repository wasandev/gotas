<?php

namespace App\Observers;

use App\Models\Tenant\Serviceprice_item;

class Serviceprice_itemObserver
{
    public function creating(Serviceprice_item $serviceprice_item)
    {
        $serviceprice_item->user_id = auth()->user()->id;
    }

    public function saving(Serviceprice_item $serviceprice_item)
    {
        $serviceprice_item->user_id = auth()->user()->id;
    }
}
