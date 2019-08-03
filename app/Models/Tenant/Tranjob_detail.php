<?php

namespace App\Models\Tenant;

use Illuminate\Database\Eloquent\Model;
use Hyn\Tenancy\Traits\UsesTenantConnection;

class Tranjob_detail extends Model
{
    use UsesTenantConnection;

    protected $fillable = [
        'tranjob_id',
        'product_id',
        'amount',
        'unit_id',
        'tranprice',
        'productprice',
        'remark'
    ];

    public function tranjob()
    {
        return $this->belongsTo('App\Models\Tenant\Tranjob');
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
