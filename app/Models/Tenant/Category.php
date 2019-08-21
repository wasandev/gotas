<?php

namespace App\Models\Tenant;

use Illuminate\Database\Eloquent\Model;
use Hyn\Tenancy\Traits\UsesTenantConnection;

class Category extends Model
{
    use UsesTenantConnection;

    protected $fillable = [
        'name', 'user_id'

    ];

    public function products()
    {
        return $this->hasMany('App\Models\Tenant\Product');
    }
    public function user()
    {
        return $this->belongsTo('App\Models\Tenant\User');
    }
}
