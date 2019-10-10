<?php

namespace App\Models\Tenant;

use Illuminate\Database\Eloquent\Model;
use Hyn\Tenancy\Traits\UsesTenantConnection;

class Customer_product_price extends Model
{
    use  UsesTenantConnection;
    //protected $table = 'customer_product_price';

    protected $fillable = [
        'customer_id', 'product_id', 'from_branch_id', 'district', 'province', 'unit_id', 'price', 'user_id', 'active'
    ];

    public function customer()
    {
        return $this->belongsTo('App\Models\Tenant\customer');
    }

    public function product()
    {
        return $this->belongsTo('App\Models\Tenant\Product');
    }

    public function from_branch()
    {
        return $this->belongsTo('App\Models\Tenant\Branch', 'from_branch_id');
    }

    public function unit()
    {
        return $this->belongsTo('App\Models\Tenant\Unit');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\Tenant\User');
    }
}
