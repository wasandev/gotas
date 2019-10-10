<?php

namespace App\Observers;

use App\Models\Tenant\Charter_price;

class CharterPriceObserver
{
    public function creating(Charter_price $charter_price)
    {
        $charter_price->user_id = auth()->user()->id;
    }

    public function saving(Charter_price $charter_price)
    {
        $charter_price->user_id = auth()->user()->id;
    }
}
