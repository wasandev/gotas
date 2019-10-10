<?php

namespace App\Observers;

use App\Models\Tenant\Charter_route;

class CharterRouteObserver
{
    public function creating(Charter_route $charter_route)
    {
        $charter_route->user_id = auth()->user()->id;
    }

    public function saving(Charter_route $charter_route)
    {
        $charter_route->user_id = auth()->user()->id;
    }
}
