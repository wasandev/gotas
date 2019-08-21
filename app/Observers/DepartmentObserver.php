<?php

namespace App\Observers;

use App\Models\Tenant\Department;

class DepartmentObserver
{
    public function creating(Department $department)
    {
        $department->user_id = auth()->user()->id;
    }

    public function saving(Department $department)
    {
        $department->user_id = auth()->user()->id;
    }
}
