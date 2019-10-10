<?php

namespace App\Models\Tenant;

use Illuminate\Database\Eloquent\Model;
use Hyn\Tenancy\Traits\UsesTenantConnection;


class District extends Model
{
    use UsesTenantConnection;

    protected $table = 'district';

    protected $fillable = [
        'name', 'province_id'
    ];

    public function province()
    {
        return $this->belongsTo('App\Models\Tenant\Province');
    }

    public function sub_districts()
    {
        return $this->hasMany('App\Models\Tenant\SubDistrict');
    }

    public function branch_area()
    {
        return $this->hasMany('App\Models\Tenant\Branch_area', 'district', 'name');
    }
}
