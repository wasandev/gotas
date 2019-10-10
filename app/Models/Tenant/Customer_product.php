<?php

namespace App\Models\Tenant;

use Illuminate\Database\Eloquent\Model;
use Hyn\Tenancy\Traits\UsesTenantConnection;

class Customer_product extends Model
{
    use UsesTenantConnection;
    protected $table = 'customer_product';

    protected $fillable = [
        'customer_id', 'product_id'
    ];

    public function customer()
    {
        return $this->belongsTo('App\Models\Tenant\customer');
    }

    public function product()
    {
        return $this->belongsTo('App\Models\Tenant\Product');
    }

    public function customer_product_prices()
    {
        return $this->hasMany('App\Models\Tenant\Customer_product_price');
    }
}
