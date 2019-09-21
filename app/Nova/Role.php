<?php

namespace App\Nova;


use Pktharindu\NovaPermissions\Nova\Role as RoleResource;

class Role extends RoleResource
{
    public static $model = 'App\Models\Tenant\Role';

    public static function label()
    {
        return 'กำหนดสิทธิ์การใช้งาน';
    }
}
