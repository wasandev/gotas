<?php

namespace App\Models\Tenant;

use Illuminate\Database\Eloquent\Model;
use Hyn\Tenancy\Traits\UsesTenantConnection;

class Serviceprice_item extends Model
{
    use UsesTenantConnection;

    protected $fillable = [
        'name', 'serviceprice_id', 'width', 'length', 'height', 'weight', 'from_branch_id', 'to_branch_id', 'price', 'user_id'
    ];

    public function serviceprice()
    {
        return $this->belongsTo('App\Models\Tenant\Serviceprice');
    }
    public function from_branch()
    {
        return $this->belongsTo('App\Models\Tenant\Branch', 'from_branch_id');
    }

    public function to_branch()
    {
        return $this->belongsTo('App\Models\Tenant\Branch', 'to_branch_id');
    }
    public function user()
    {
        return $this->belongsTo('App\Models\Tenant\User');
    }
}
