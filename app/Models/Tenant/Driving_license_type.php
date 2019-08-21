<?php

namespace App\Models\Tenant;

use Illuminate\Database\Eloquent\Model;
use Hyn\Tenancy\Traits\UsesTenantConnection;

class Driving_license_type extends Model
{
    use UsesTenantConnection;


    protected $fillable = [
        'name', 'user_id'
    ];

    public function employee()
    {
        return $this->belongsTo('App\Models\Tenant\Employee');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\Tenant\User');
    }
}
