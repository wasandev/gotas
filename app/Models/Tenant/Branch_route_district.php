<?php

namespace App\Models\Tenant;

use Illuminate\Database\Eloquent\Model;
use Hyn\Tenancy\Traits\UsesTenantConnection;

class Branch_route_district extends Model
{
    use UsesTenantConnection;

    protected $fillable = [
        'branch_route_id', 'branch_area_id',
        'distance', 'user_id'
    ];

    public function branch_route()
    {
        return $this->belongsTo('App\Models\Tenant\Branch_route');
    }

    public function branch_area()
    {
        return $this->belongsTo('App\Models\Tenant\Branch_area');
    }
}
