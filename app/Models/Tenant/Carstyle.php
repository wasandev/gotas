<?php

namespace App\Models\Tenant;

use Illuminate\Database\Eloquent\Model;
use Hyn\Tenancy\Traits\UsesTenantConnection;

class Carstyle extends Model
{
    use UsesTenantConnection;

    protected $fillable = [
        'name', 'user_id'
    ];
    public function user()
    {
        return $this->belongsTo('App\Models\Tenant\User');
    }
}
