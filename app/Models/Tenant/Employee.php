<?php

namespace App\Models\Tenant;

use Illuminate\Database\Eloquent\Model;
use Hyn\Tenancy\Traits\UsesTenantConnection;

class Employee extends Model
{
    use UsesTenantConnection;

    protected $fillable = [
        'status',
        'branch_id',
        'department_id',
        'name',
        'nickname',
        'position_id',
        'taxid',
        'address',
        'sub_district',
        'district',
        'province',
        'postal_code',
        'country',
        'description',
        'imagefile',
        'phoneno',
        'facebook',
        'line',
        'location_lat',
        'location_lng',
        'type',
        'driving_license_type_id',
        'driving_license_no',
        'driving_license_date',
        'driving_license_enddate',
        'user_id'
    ];

    protected $casts = [
        'driving_license_date' => 'date',
        'driving_license_enddate' => 'date',
    ];
    public function user()
    {
        return $this->belongsTo('App\Models\Tenant\User');
    }


    public function branch()
    {
        return $this->belongsTo('App\Models\Tenant\Branch');
    }

    public function department()
    {
        return $this->belongsTo('App\Models\Tenant\Department');
    }

    public function position()
    {
        return $this->belongsTo('App\Models\Tenant\Position');
    }

    public function driving_license_type()
    {
        return $this->belongsTo('App\Models\Tenant\Driving_license_type');
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
