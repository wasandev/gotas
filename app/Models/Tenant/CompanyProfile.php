<?php

namespace App\Models\Tenant;

use Illuminate\Database\Eloquent\Model;
use Hyn\Tenancy\Traits\UsesTenantConnection;

class CompanyProfile extends Model
{
    use UsesTenantConnection;

    protected $fillable = [
        'company_name',
        'taxid',
        'address',
        'sub_district',
        'district',
        'province',
        'postal_code',
        'country',
        'description',
        'imagefile',
        'logofile',
        'phoneno',
        'weburl',
        'facebook',
        'line',
        'location_lat',
        'location_lng',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\Tenant\User');
    }
}
