<?php

namespace App\Models\Tenant;

use Illuminate\Database\Eloquent\Model;
use Hyn\Tenancy\Traits\UsesTenantConnection;

class Unit extends Model
{
    use UsesTenantConnection;

    protected $fillable = [
        'name', 'user_id'
    ];

    public function product()
    {
        return $this->belongsTo('App\Models\Tenant\product');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\Tenant\User');
    }
}
