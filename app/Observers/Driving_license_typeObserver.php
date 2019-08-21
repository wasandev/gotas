<?php

namespace App\Observers;

use App\Models\Tenant\Driving_license_type;

class Driving_license_typeObserver
{
    public function creating(Driving_license_type $driving_license_type)
    {
        $driving_license_type->user_id = auth()->user()->id;
    }

    public function saving(Driving_license_type $driving_license_type)
    {
        $driving_license_type->user_id = auth()->user()->id;
    }
}
