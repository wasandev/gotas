<?php

namespace App\Models\Tenant;

use Illuminate\Database\Eloquent\Model;
use Hyn\Tenancy\Traits\UsesTenantConnection;

class Branch_route extends Model
{
    use UsesTenantConnection;

    protected $fillable = [
        'branch_id', 'branch_area_id',
        'name', 'distinct', 'user_id'
    ];

    public function branch()
    {
        return $this->belongsTo('App\Models\Tenant\Branch');
    }

    public function branch_area()
    {
        return $this->belongsTo('App\Models\Tenant\Branch_area');
    }
}
