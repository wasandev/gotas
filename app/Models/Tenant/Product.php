<?php

namespace App\Models\Tenant;

use Illuminate\Database\Eloquent\Model;
use Hyn\Tenancy\Traits\UsesTenantConnection;

class Product extends Model
{
    use UsesTenantConnection;

    protected $fillable = [
        'name',
        'category_id',
        'unit_id',
        'product_style_id',
        'status',
        'weight',
        'length',
        'height'
    ];

    public function category()
    {
        return $this->belongsTo('App\Models\Tenant\Category');
    }

    public function product_images()
    {
        return $this->hasMany('App\Models\Tenant\Product_image');
    }

    public function unit()
    {
        return $this->belongsTo('App\Models\Tenant\Unit');
    }

    public function product_style()
    {
        return $this->belongsTo('App\Models\Tenant\Product_style');
    }
}
