<?php

namespace App\Models\Tenant;

use App\Models\Shared\User as SharedUser;
use Hyn\Tenancy\Traits\UsesTenantConnection;

class User extends SharedUser
{
    use UsesTenantConnection;

    public function branch()
    {
        return $this->belongsTo('App\Models\Tenant\Branch');
    }
}
