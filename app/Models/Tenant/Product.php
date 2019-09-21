<?php

namespace App\Models\Tenant;

use Illuminate\Database\Eloquent\Model;
use Hyn\Tenancy\Traits\UsesTenantConnection;

class Product extends Model
{
    use UsesTenantConnection;

    protected $fillable = [
        'status',
        'name',
        'category_id',
        'product_style_id',
        'width',
        'length',
        'height',
        'weight',
        'unit_id',
        'user_id'
    ];

    public function category()
    {
        return $this->belongsTo('App\Models\Tenant\Category');
    }

    public function unit()
    {
        return $this->belongsTo('App\Models\Tenant\Unit');
    }
    public function product_images()
    {
        return $this->hasMany('App\Models\Tenant\Product_image');
    }



    public function product_style()
    {
        return $this->belongsTo('App\Models\Tenant\Product_style');
    }
    public function user()
    {
        return $this->belongsTo('App\Models\Tenant\User');
    }

    public function customer()
    {
        return $this->belongsToMany('App\Models\Tenant\Customer')->withPivot('price')
            ->withTimestamps();
    }

    public function productservice_price()
    {
        return $this->hasMany('App\Models\Tenant\Productservice_price', 'product_id');
    }
}
