<?php

namespace App\Models\Tenant;

use Illuminate\Database\Eloquent\Model;
use Hyn\Tenancy\Traits\UsesTenantConnection;

class Position extends Model
{
    use UsesTenantConnection;


    protected $fillable = [
        'name'
    ];
}
