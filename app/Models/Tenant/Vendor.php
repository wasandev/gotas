<?php

namespace App\Models\Tenant;

use Illuminate\Database\Eloquent\Model;
use Hyn\Tenancy\Traits\UsesTenantConnection;

class Vendor extends Model
{
    use UsesTenantConnection;

    protected $fillable = [
        'status',
        'type',
        'user_id',
        'taxid',
        'paymenttype',
        'creditterm',
        'name',
        'address',
        'sub_district',
        'district',
        'province',
        'postal_code',
        'country',
        'description',
        'contractname',
        'imagefile',
        'logofile',
        'phoneno',
        'weburl',
        'facebook',
        'line',
        'location_lat',
        'location_lng',
        'bussinesstype_id',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\Tenant\User');
    }

    public function businesstype()
    {
        return $this->belongsTo('App\Models\Tenant\Businesstype');
    }



    /*
	Provide the Location value to the Nova field
	*/
    public function getLocationAttribute()
    {
        return (object) [
            'latitude' => $this->location_lat,
            'longitude' => $this->location_lng,
        ];
    }


    /*
	Transform the returned value from the Nova field
	*/
    public function setLocationAttribute($value)
    {
        $location_lat = round(object_get($value, 'latitude'), 7);
        $location_lng = round(object_get($value, 'longitude'), 7);
        $this->attributes['location_lat'] = $location_lat;
        $this->attributes['location_lng'] = $location_lng;
    }
}
