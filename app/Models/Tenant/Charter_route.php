<?php

namespace App\Models\Tenant;

use Illuminate\Database\Eloquent\Model;
use Hyn\Tenancy\Traits\UsesTenantConnection;

class Charter_route extends Model
{
    use UsesTenantConnection;

    protected $fillable = [
        'name',  'branch_area_id', 'to_district', 'to_province', 'status', 'distance', 'user_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\Tenant\User');
    }
    public function charter_prices()
    {
        return $this->hasMany('App\Models\Tenant\Charter_price');
    }

    public function charter_route_costs()
    {
        return $this->hasMany('App\Models\Tenant\Charter_route_cost');
    }
    public function branch()
    {
        return $this->belongsTo('App\Models\Tenant\Branch');
    }
    public function branch_area()
    {
        return $this->belongsTo('App\Models\Tenant\Branch_area');
    }
}
