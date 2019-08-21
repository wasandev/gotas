<?php

namespace App\Observers;

use App\Models\Tenant\Cartype;

class CartypeObserver
{
    public function creating(Cartype $cartype)
    {
        $cartype->user_id = auth()->user()->id;
    }

    public function saving(Cartype $cartype)
    {
        $cartype->user_id = auth()->user()->id;
    }
}
