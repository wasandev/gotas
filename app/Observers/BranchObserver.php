<?php

namespace App\Observers;

use App\Models\Tenant\Branch;

class BranchObserver
{
    public function creating(Branch $branch)
    {
        $branch->user_id = auth()->user()->id;
    }

    public function saving(Branch $branch)
    {
        $branch->user_id = auth()->user()->id;
    }
}
