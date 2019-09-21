<?php

namespace App\Observers;

use App\Models\Tenant\Routeto_branch;

class RoutetoBranchObserver
{
    public function creating(Routeto_branch $routeto_branch)
    {
        $routeto_branch->user_id = auth()->user()->id;
    }

    public function saving(Routeto_branch $routeto_branch)
    {
        $routeto_branch->user_id = auth()->user()->id;
    }
}
