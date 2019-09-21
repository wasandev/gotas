<?php

namespace App\Models\Tenant;


use Hyn\Tenancy\Traits\UsesTenantConnection;
use Pktharindu\NovaPermissions\Role as NovaPermissionRole;

class Role extends NovaPermissionRole
{
    use UsesTenantConnection;
    protected $guard_name = 'tenants';
}
