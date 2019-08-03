<?php

namespace App\Models\Tenant;

use Illuminate\Database\Eloquent\Model;
use Hyn\Tenancy\Traits\UsesTenantConnection;

class Post extends Model
{
    use UsesTenantConnection;

    protected $fillable = [
        'user_id',
        'title',
        'content',
        'image',
        'published',
        'published_at'
    ];
    protected $casts = [
        'published_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\Tenant\User');
    }

    public function comments()
    {
        return $this->hasMany('App\Models\Tenant\Comment');
    }
}
