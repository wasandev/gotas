<?php

namespace App\Observers;

use App\Models\Tenant\Branch_area;

class BranchAreaObserver
{
    public function creating(Branch_area $branch_area)
    {
        $branch_area->user_id = auth()->user()->id;
    }

    public function saving(Branch_area $branch_area)
    {
        $branch_area->user_id = auth()->user()->id;
    }
}
