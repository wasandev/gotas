<?php

namespace App\Models\Tenant;

use Illuminate\Database\Eloquent\Model;
use Hyn\Tenancy\Traits\UsesTenantConnection;

class Department extends Model
{
    use UsesTenantConnection;


    protected $fillable = [
        'name'
    ];

    public function employee()
    {
        return $this->belongsTo('App\Models\Tenant\Employee');
    }
}
