<?php

namespace App\Models\Tenant;

use Illuminate\Database\Eloquent\Model;
use Hyn\Tenancy\Traits\UsesTenantConnection;


class Branch_area extends Model
{
    use UsesTenantConnection;

    protected $fillable = [
        'branch_id',
        'district',
        'province',
        'location_lat',
        'location_lng',
        'user_id'
    ];

    public function branch()
    {
        return $this->belongsTo('App\Models\Tenant\Branch');
    }


    public function user()
    {
        return $this->belongsTo('App\Models\Tenant\User');
    }

    public function charter_routes()
    {
        return $this->hasMany('App\Models\Tenant\Charter_route');
    }
}
