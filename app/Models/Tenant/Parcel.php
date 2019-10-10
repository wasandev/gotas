<?php

namespace App\Models\Tenant;

use Illuminate\Database\Eloquent\Model;
use Hyn\Tenancy\Traits\UsesTenantConnection;

class Parcel extends Model
{
    use UsesTenantConnection;

    protected $fillable = [
        'name', 'width', 'length', 'height', 'weight'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\Tenant\User');
    }

    public function serviceprice_items()
    {
        return $this->hasMany('App\Models\Tenant\Serviceprice_item');
    }
}
