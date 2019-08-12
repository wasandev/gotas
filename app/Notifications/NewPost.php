<?php

namespace App\Notifications;

use Coreproc\NovaNotificationFeed\Notifications\NovaBroadcastMessage;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\Post;
use App\User;

class NewPost extends Notification implements ShouldQueue
{
    use Queueable;

    protected $following;
    protected $post;
    protected $level;
    protected $message;

    public function __construct(User $following, Post $post, $level, $message)
    {
        $this->following = $following;
        $this->post = $post;
        $this->level = $level;
        $this->message = $message;
    }

    public function via($notifiable)
    {
        return ['database', 'broadcast'];
    }

    public function toDatabase($notifiable)
    {
        return [
            'following_id' => $this->following->id,
            'following_name' => $this->following->name,
            'post_id' => $this->post->id,
            'level' => $this->level,
            'message' => $this->message,
            'url' => 'https://gotas.online',
        ];
    }
    public function toArray($notifiable)
    {
        return [
            'id' => $this->id,
            'read_at' => null,
            'data' => [
                'following_id' => $this->following->id,
                'following_name' => $this->following->name,
                'post_id' => $this->post->id,
                'level' => $this->level,
                'message' => $this->message,
                'url' => 'https://gotas.online',
            ],
        ];
    }

    /**
     * Get the broadcastable representation of the notification.
     *
     * @param  mixed $notifiable
     * @return BroadcastMessage
     */
    public function toBroadcast($notifiable)
    {
        return new NovaBroadcastMessage($this->toArray($notifiable));
    }
}
