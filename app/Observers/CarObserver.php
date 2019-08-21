<?php

namespace App\Observers;

use App\Models\Tenant\Car;

class CarObserver
{
    public function creating(Car $car)
    {
        $car->user_id = auth()->user()->id;
    }

    public function saving(Car $car)
    {
        $car->user_id = auth()->user()->id;
    }
}
