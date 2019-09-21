<?php

namespace App\Models\Tenant;

use Illuminate\Database\Eloquent\Model;

class Counter extends Model
{
    protected $fillable = [
        'key', 'prefix', 'value'
    ];
}
