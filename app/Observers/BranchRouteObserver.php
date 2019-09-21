<?php

namespace App\Observers;

use App\Models\Tenant\Branch_route;

class BranchRouteObserver
{
    public function creating(Branch_route $branch_route)
    {
        $branch_route->user_id = auth()->user()->id;
    }

    public function saving(Branch_route $branch_route)
    {
        $branch_route->user_id = auth()->user()->id;
    }
}
