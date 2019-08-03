<?php

namespace App\Models\System;

use App\Models\System\User;
use Hyn\Tenancy\Abstracts\SystemModel;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Hyn\Tenancy\Contracts\Website as WebsiteContract;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Website extends SystemModel implements WebsiteContract
{
    public function hostnames(): HasMany
    {
        return $this->hasMany(config('tenancy.models.hostname'));
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
