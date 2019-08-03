<?php

namespace App\Observers;

use App\Models\Tenant\Tranjob;

class TranjobObserver
{
    public function creating(Tranjob $tranjob)
    {
        $tranjob->user_id = auth()->user()->id;
        $tranjob->trantype = 'charter';
    }
}
