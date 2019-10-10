<?php

namespace App\Models\Tenant;

use Hyn\Tenancy\Traits\UsesTenantConnection;
use Illuminate\Database\Eloquent\Model;

class Routeto_branch_cost extends Model
{
    use UsesTenantConnection;

    protected $fillable = [
        'routeto_branch_id', 'cartype_id', 'carstyle_id', 'status', 'fuel_cost', 'fuel_amount', 'timespent',  'car_charge', 'driver_charge', 'user_id'
    ];

    public function routeto_branch()
    {
        return $this->belongsTo('App\Models\Tenant\Routeto_branch');
    }
    public function cartype()
    {
        return $this->belongsTo('App\Models\Tenant\Cartype');
    }

    public function carstyle()
    {
        return $this->belongsTo('App\Models\Tenant\Carstyle');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\Tenant\User');
    }
}
