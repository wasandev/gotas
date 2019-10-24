<?php

namespace App\Models\Tenant;

use Illuminate\Database\Eloquent\Model;
use Hyn\Tenancy\Traits\UsesTenantConnection;

class Charter_job_insurance extends Model
{
    use  UsesTenantConnection;

    protected $fillable = [
        'charter_job_id', 'vendor_id', 'insurance_no', 'insurance_fee', 'insurance_cost',
    ];

    public function charter_job()
    {
        return $this->belongsTo('App\Models\Tenant\Charter_job');
    }

    public function vendor()
    {
        return $this->belongsTo('App\Models\Tenant\Vendor');
    }
}
