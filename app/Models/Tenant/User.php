<?php

namespace App\Models\Tenant;

use App\Models\Shared\User as SharedUser;
use Hyn\Tenancy\Traits\UsesTenantConnection;
use Pktharindu\NovaPermissions\Traits\HasRoles;

class User extends SharedUser
{
    use UsesTenantConnection, HasRoles;
    protected $guard_name = 'tenants';


    public function branch()
    {
        return $this->belongsTo('App\Models\Tenant\Branch');
    }
}
