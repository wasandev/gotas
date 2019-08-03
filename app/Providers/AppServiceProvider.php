<?php

namespace App\Providers;


use Illuminate\Support\ServiceProvider;
use App\Models\Tenant\Post;
use App\Observers\PostObserver;
use App\Models\Tenant\Comment;
use App\Observers\CommentObserver;
use App\Models\Tenant\Customer;
use App\Observers\CustomerObserver;
use App\Models\Tenant\Tranjob;
use App\Observers\TranjobObserver;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {




        //Post::observe(PostObserver::class);
        //Comment::observe(CommentObserver::class);
        Customer::observe(CustomerObserver::class);
        Tranjob::observe(TranjobObserver::class);
    }
}
