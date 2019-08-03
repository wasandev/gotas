<?php

namespace App\Models\Tenant;

use Illuminate\Database\Eloquent\Model;
use Hyn\Tenancy\Traits\UsesTenantConnection;

class Tiretype extends Model
{
    use UsesTenantConnection;

    protected $fillable = [
        'name'
    ];

    public function car()
    {
        return $this->belongsTo('App\Modeles\Tenant\Car');
    }
}
