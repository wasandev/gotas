<?php

namespace App\Models\Tenant;

use Illuminate\Database\Eloquent\Model;
use Hyn\Tenancy\Traits\UsesTenantConnection;


class Serviceprice extends Model
{
    use UsesTenantConnection;
    protected $fillable = [
        'name', 'status', 'pricetypes', 'startrate', 'oversizerate', 'start_date', 'end_date'
    ];

    protected $casts = [
        'start_date' => 'datetime:d-m-Y',
        'end_date' => 'datetime:d-m-Y',
    ];

    public function serviceprice_items()
    {
        return $this->hasMany('App\Models\Tenant\Serviceprice_item');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\Tenant\User');
    }
}
