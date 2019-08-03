<?php

namespace App\Observers;


use App\Notifications\NewPost;
use App\Models\Tenant\Post;

class PostObserver
{
    /**
     * Handle the post "creating" event.
     *
     * @param  \App\Retailer  $retailer
     * @return void
     */
    public function creating(Post $post)
    {
        $post->user_id = auth()->user()->id;
    }

    /**
     * Handle the post "created" event.
     *
     * @param  \App\Post  $post
     * @return void
     */


    public function created(Post $post)
    {
        /* $user = $post->user;
        $message = $post->title;

        foreach ($user->followers as $follower) {
            $follower->notify(new NewPost($user, $post, 'info', $message));
        } */ }

    /**
     * Handle the post "updated" event.
     *
     * @param  \App\Post  $post
     * @return void
     */
    public function updated(Post $post)
    {
        //
    }

    /**
     * Handle the post "deleted" event.
     *
     * @param  \App\Post  $post
     * @return void
     */
    public function deleted(Post $post)
    {
        //
    }

    /**
     * Handle the post "restored" event.
     *
     * @param  \App\Post  $post
     * @return void
     */
    public function restored(Post $post)
    {
        //
    }

    /**
     * Handle the post "force deleted" event.
     *
     * @param  \App\Post  $post
     * @return void
     */
    public function forceDeleted(Post $post)
    {
        //
    }
}
