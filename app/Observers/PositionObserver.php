<?php

namespace App\Observers;

use App\Models\Tenant\Position;

class PositionObserver
{
    public function creating(Position $position)
    {
        $position->user_id = auth()->user()->id;
    }
    //retrieved
    public function saving(Position $position)
    {
        $position->user_id = auth()->user()->id;
    }
}
