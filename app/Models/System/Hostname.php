<?php

namespace App\Models\System;

use Hyn\Tenancy\Abstracts\SystemModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Hyn\Tenancy\Contracts\Hostname as HostnameContract;

class Hostname extends SystemModel implements HostnameContract
{
    public function website(): BelongsTo
    {
        return $this->belongsTo(config('tenancy.models.website'));
    }
}
