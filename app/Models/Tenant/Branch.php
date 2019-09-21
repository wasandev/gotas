<?php

namespace App\Models\Tenant;

use Illuminate\Database\Eloquent\Model;
use Hyn\Tenancy\Traits\UsesTenantConnection;

class Branch extends Model
{
    use UsesTenantConnection;

    protected $fillable = [
        'code',
        'name',
        'address',
        'sub_district',
        'district',
        'province',
        'postal_code',
        'country',
        'phoneno',
        'type',
        'location_lat',
        'location_lng',
        'user_id',
    ];

    public function branch_areas()
    {
        return $this->hasMany('App\Models\tenant\Branch_area');
    }

    public function branch_routes()
    {
        return $this->hasMany('App\Models\Tenant\Branch_route');
    }

    public function getLocationAttribute()
    {
        return (object) [
            'latitude' => $this->location_lat,
            'longitude' => $this->location_lng,
        ];
    }

    public function user()
    {
        return $this->belongsTo('App\Models\Tenant\User');
    }

    public function serviceprice_items()
    {
        return $this->hasMany('App\Models\Tenant\Serviceprice_item', 'from_branch_id', 'id');
    }


    public function routeto()
    {
        return $this->belongsToMany('App\Models\Tenant\Branch', 'routeto_branch', 'branch_id', 'dest_branch_id')
            ->withPivot('name', 'distance')
            ->withTimestamps();
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
