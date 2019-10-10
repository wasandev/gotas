<?php

namespace App\Models\Tenant;

use Illuminate\Database\Eloquent\Model;
use Hyn\Tenancy\Traits\UsesTenantConnection;

class Charter_route_cost extends Model
{
    use UsesTenantConnection;

    protected $fillable = [
        'cartype_id', 'carstyle_id', 'charter_route_id',  'status', 'fuel_cost', 'fuel_amount', 'timespent',  'car_charge', 'driver_charge', 'user_id'
    ];

    public function charter_route()
    {
        return $this->belongsTo('App\Models\Tenant\Charter_route');
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
