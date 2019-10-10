<?php

namespace App\Models\Tenant;

use Illuminate\Database\Eloquent\Model;
use Hyn\Tenancy\Traits\UsesTenantConnection;

class Branch_route extends Model
{
    use UsesTenantConnection;

    protected $fillable = [
        'branch_id', 'name', 'distance', 'user_id'
    ];

    public function branch()
    {
        return $this->belongsTo('App\Models\Tenant\Branch');
    }

    public function branch_route_districts()
    {
        return $this->hasMany('App\Models\Tenant\Branch_route_district');
    }

    public function branch_route_costs()
    {
        return $this->hasMany('App\Models\Tenant\Branch_route_cost');
    }
}
