<?php

namespace App\Models\System;

use App\Models\Shared\User as SharedUser;
use Hyn\Tenancy\Traits\UsesSystemConnection;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Relations\HasOne;

class User extends SharedUser implements MustVerifyEmail
{
    use UsesSystemConnection;



    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'set_up' => 'boolean'
    ];
    protected $dates = [
        'trial_until'
    ];
    public function profile()
    {
        return $this->hasOne('App\System\Profile');
    }


    public function posts()
    {
        return $this->HasMany('App\System\Post');
    }



    /**
     * The channels the user receives notification broadcasts on.
     *
     * @return string
     */
    public function receivesBroadcastNotificationsOn()
    {
        return 'users.' . $this->id;
    }

    public function website(): HasOne
    {
        return $this->hasOne(config('tenancy.models.website'));
    }

    public function getFreeTrialDaysLeftAttribute()
    {
        // Future field that will be implemented after payments
        if ($this->plan_until) {
            return 0;
        }

        return now()->diffInDays($this->trial_until, false);
    }
}
