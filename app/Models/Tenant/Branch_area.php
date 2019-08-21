<?php

namespace App\Models\Tenant;

use Illuminate\Database\Eloquent\Model;
use Hyn\Tenancy\Traits\UsesTenantConnection;


class Branch_area extends Model
{
    use UsesTenantConnection;

    protected $fillable = [
        'branch_id',
        'sub_district',
        'district',
        'province',
        'postal_code',
        'country',
        'user_id'
    ];

    public function branch()
    {
        return $this->belongsTo('App\Models\Tenant\Branch');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\Tenant\User');
    }
}
