<?php

namespace App\Providers;

use App\Listeners\FinishUserSetup;
use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use Hyn\Tenancy\Events\Websites\Created as WebsiteCreated;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        WebsiteCreated::class => [
            FinishUserSetup::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
