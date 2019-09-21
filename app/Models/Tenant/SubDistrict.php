<?php

namespace App\Models\Tenant;

use Illuminate\Database\Eloquent\Model;
use Hyn\Tenancy\Traits\UsesTenantConnection;


class SubDistrict extends Model
{
    use UsesTenantConnection;

    protected $table = 'sub_district';

    protected $fillable = [
        'name', 'district_id'
    ];

    public function district()
    {
        return $this->belongsTo('App\Models\Tenant\District');
    }
}
