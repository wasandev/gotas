<?php

namespace App\Models\Tenant;

use Hyn\Tenancy\Traits\UsesTenantConnection;
use Illuminate\Database\Eloquent\Model;

class Branch_route_cost extends Model
{
    use UsesTenantConnection;

    protected $fillable = [
        'branch_route_id', 'cartype_id', 'carstyle_id', 'status', 'fuel_cost', 'fuel_amount', 'timespent',  'car_charge', 'driver_charge', 'user_id'
    ];

    public function branch_route()
    {
        return $this->belongsTo('App\Models\Tenant\Branch_route');
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
