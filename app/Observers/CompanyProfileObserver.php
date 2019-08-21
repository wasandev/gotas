<?php

namespace App\Observers;

use App\Models\Tenant\CompanyProfile;

class CompanyProfileObserver
{
    public function creating(CompanyProfile $companyprofile)
    {
        $companyprofile->user_id = auth()->user()->id;
    }

    public function saving(CompanyProfile $companyprofile)
    {
        $companyprofile->user_id = auth()->user()->id;
    }
}
