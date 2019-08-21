<?php

namespace App\Observers;

use App\Models\Tenant\Carstyle;

class CarstyleObserver
{
    public function creating(Carstyle $carstyle)
    {
        $carstyle->user_id = auth()->user()->id;
    }

    public function saving(Carstyle $carstyle)
    {
        $carstyle->user_id = auth()->user()->id;
    }
}
