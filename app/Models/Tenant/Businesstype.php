<?php

namespace App\Models\Tenant;

use Illuminate\Database\Eloquent\Model;
use Hyn\Tenancy\Traits\UsesTenantConnection;

class Businesstype extends Model
{
    use UsesTenantConnection;

    protected $fillable = [
        'name'
    ];

    public function customers()
    {
        return $this->hasMany('App\Models\Tenant\Customer');
    }
}
