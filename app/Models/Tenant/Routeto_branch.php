<?php

namespace App\Models\Tenant;

use Illuminate\Database\Eloquent\Relations\Pivot;
use Hyn\Tenancy\Traits\UsesTenantConnection;


class Routeto_branch extends Pivot
{
    use UsesTenantConnection;
    //public $incrementing = true;
    protected $table = 'routeto_branch';

    protected $fillable = [
        'branch_id',
        'dest_branch_id',
        'name',
        'distance',
        'user_id'
    ];



    public function branch()
    {
        return $this->belongsTo('App\Models\Tenant\Branch', 'branch_id');
    }

    public function dest_branch()
    {
        return $this->belongsTo('App\Models\Tenant\Branch', 'dest_branch_id');
    }
}
