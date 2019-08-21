<?php

namespace App\Observers;

use App\Models\Tenant\Businesstype;

class BusinesstypeObserver
{
    public function creating(Businesstype $businesstype)
    {
        $businesstype->user_id = auth()->user()->id;
    }

    public function saving(Businesstype $businesstype)
    {
        $businesstype->user_id = auth()->user()->id;
    }
}
