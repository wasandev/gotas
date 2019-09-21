<?php

namespace App\Models\Tenant;

use Illuminate\Database\Eloquent\Model;
use Hyn\Tenancy\Traits\UsesTenantConnection;


class Province extends Model
{
    use UsesTenantConnection;

    protected $table = 'province';

    protected $fillable = [
        'name'
    ];

    public function car()
    {
        return $this->hasMany('App\Models\Tenant\Car', 'car_province');
    }

    public function districts()
    {
        return $this->hasMany('App\Models\Tenant\District');
    }
}
