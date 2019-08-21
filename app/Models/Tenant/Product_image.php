<?php

namespace App\Models\Tenant;

use Illuminate\Database\Eloquent\Model;
use Hyn\Tenancy\Traits\UsesTenantConnection;

class Product_image extends Model
{
    use UsesTenantConnection;

    protected $fillable = [
        'product_id',
        'product_image',
        'user_id'

    ];

    public function product()
    {
        return $this->belongsTo('App\Models\Tenant\Product');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\Tenant\User');
    }
}
