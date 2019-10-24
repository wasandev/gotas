<?php

namespace App\Models\Tenant;

use Illuminate\Database\Eloquent\Model;
use Hyn\Tenancy\Traits\UsesTenantConnection;


class Charter_job_item extends Model
{
    use UsesTenantConnection;

    protected $fillable = [
        'charter_job_id', 'from_address_id', 'to_address_id', 'product_id', 'amount', 'unit_id', 'total_weight', 'productvalue', 'pickup_date', 'delivery_date'
    ];

    protected $casts = [
        'pickup_date' => 'datetime',
        'delivery_date' => 'datetime'
    ];

    public function charter_job()
    {
        return $this->belongsTo('App\Models\Tenant\Charter_job');
    }

    public function from_address()
    {
        return $this->belongsTo('App\Models\Tenant\Address', 'from_address_id');
    }
    public function to_address()
    {
        return $this->belongsTo('App\Models\Tenant\Address', 'to_address_id');
    }

    public function product()
    {
        return $this->belongsTo('App\Models\Tenant\Product');
    }
    public function unit()
    {
        return $this->belongsTo('App\Models\Tenant\Unit');
    }
}
