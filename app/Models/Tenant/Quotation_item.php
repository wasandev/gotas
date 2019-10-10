<?php

namespace App\Models\Tenant;

use Illuminate\Database\Eloquent\Model;
use Hyn\Tenancy\Traits\UsesTenantConnection;

class Quotation_item extends Model
{
    use UsesTenantConnection;

    protected $fillable = [
        'quotation_id', 'from_address_id', 'to_address_id', 'cartype_id', 'carstyle_id', 'product_id', 'number', 'unit_id', 'total_weight', 'amount', 'pickup_date', 'delivery_date'
    ];
    protected $casts = [
        'pickup_date' => 'datetime',
        'delivery_date' => 'datetime'
    ];
    public function quotation()
    {
        return $this->belongsTo('App\Models\Tenant\Quotation');
    }
    public function from_address()
    {
        return $this->belongsTo('App\Models\Tenant\Address');
    }
    public function to_address()
    {
        return $this->belongsTo('App\Models\Tenant\Address');
    }

    public function product()
    {
        return $this->belongsTo('App\Models\Tenant\Product');
    }

    public function unit()
    {
        return $this->belongsTo('App\Models\Tenant\Unit');
    }

    public function cartype()
    {
        return $this->belongsTo('App\Models\Tenant\Cartype');
    }
    public function carstyle()
    {
        return $this->belongsTo('App\Models\Tenant\Carstyle');
    }
}
