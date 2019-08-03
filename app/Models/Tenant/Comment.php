<?php

namespace App\Models\Tenant;

use Illuminate\Database\Eloquent\Model;
use Hyn\Tenancy\Traits\UsesTenantConnection;

class Comment extends Model
{
    use UsesTenantConnection;

    protected $fillable = [
        'user_id',
        'post_id',
        'comment'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\Tenant\User');
    }

    public function post()
    {
        return $this->belongsTo('App\Models\Tenant\Post');
    }
}
