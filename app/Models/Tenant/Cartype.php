<?php

namespace App\Models\Tenant;

use Illuminate\Database\Eloquent\Model;
use Hyn\Tenancy\Traits\UsesTenantConnection;

class Cartype extends Model
{
    use UsesTenantConnection;

    protected $fillable = [
        'name', 'user_id', 'payload'
    ];

    public function car()
    {
        return $this->belongsTo('App\Models\Tenant\Car');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\Tenant\User');
    }
}
