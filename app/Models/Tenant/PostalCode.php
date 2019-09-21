<?php

namespace App\Models\Tenant;

use Illuminate\Database\Eloquent\Model;
use Hyn\Tenancy\Traits\UsesTenantConnection;


class PostalCode extends Model
{
    use UsesTenantConnection;

    protected $table = 'postal_code';

    protected $fillable = [
        'code', 'sub_district_id', 'district_id', 'province_id'
    ];

    public function sub_distrinct()
    {
        return $this->belongsTo('App\Models\Tenant\SubDistict');
    }
    public function district()
    {
        return $this->belongsTo('App\Models\Tenant\District');
    }
    public function province()
    {
        return $this->belongsTo('App\Models\Tenant\Province');
    }
}
