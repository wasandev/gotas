<?php

namespace App\Models\Tenant;

use Hyn\Tenancy\Traits\UsesTenantConnection;

use Pktharindu\NovaPermissions\Permission as NovaPermission;

class Permission extends NovaPermission
{
    use UsesTenantConnection;
    protected $guard_name = 'tenants';
}
