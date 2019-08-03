<?php

namespace App\Models\Tenant;

use Illuminate\Database\Eloquent\Model;
use Hyn\Tenancy\Traits\UsesTenantConnection;


class Province extends Model
{
    use UsesTenantConnection;

    protected $fillable = [
        'name'
    ];

    public function car()
    {
        return $this->hasMany('App\Models\Tenant\Car', 'car_province');
    }
}
