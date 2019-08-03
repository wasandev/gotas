<?php

namespace App\Notifications\System;

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Password;


class TenantCreated extends Notification
{
    private $hostname;

    public function __construct($hostname)
    {
        $this->hostname = $hostname;
    }
    public function via()
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        $token = Password::broker()->createToken($notifiable);
        $resetUrl = "http://{$this->hostname->fqdn}/app/password/reset/{$token}";
        $app = config('app.name');
        return (new MailMessage())
            ->subject("{$app} Invitation")
            ->greeting("Hello {$notifiable->name},")
            ->line("You have been invited to use {$app}!")
            ->line('To get started you need to set a password.')
            ->action('Set password', $resetUrl);
    }
}
