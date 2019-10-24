<?php

namespace App\Models\Tenant;

use Illuminate\Database\Eloquent\Model;
use Hyn\Tenancy\Traits\UsesTenantConnection;

class Charter_job_status extends Model
{
    use UsesTenantConnection;

    protected $fillable = [
        'charter_job_id', 'status', 'user_id'
    ];
    protected $casts = [

        'created_at' => 'datetime',
        'updated-_at' => 'datetime'
    ];
    public function charter_job()
    {
        return $this->belongsTo('App\Models\Tenant\Charter_job');
    }
}
