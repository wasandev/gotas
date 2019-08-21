<?php

namespace App\Observers;

use App\Models\Tenant\Province;

class ProvinceObserver
{
    public function creating(Province $province)
    {
        $province->user_id = auth()->user()->id;
    }

    public function saving(Province $province)
    {
        $province->user_id = auth()->user()->id;
    }
}
