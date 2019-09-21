<?php

namespace App\Models\Tenant;

use Illuminate\Database\Eloquent\Model;
use Hyn\Tenancy\Traits\UsesTenantConnection;


class Productservice_price extends Model
{
    use UsesTenantConnection;

    protected $fillable = [
        'product_id', 'from_branch_id', 'unit_id', 'price', 'district', 'province', 'user_id'
    ];

    protected $table = 'productservice_price';

    public function product()
    {
        return $this->belongsTo('App\Models\Tenant\Product');
    }

    public function unit()
    {
        return $this->belongsTo('App\Models\Tenant\Unit');
    }

    public function from_branch()
    {
        return $this->belongsTo('App\Models\Tenant\Branch', 'from_branch_id');
    }
}
