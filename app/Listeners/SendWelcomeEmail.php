<?php

namespace App\Listeners;

use App\Events\AuthenticationEvent;
use App\Notifications\RegisterNotification;
use Illuminate\Support\Facades\Notification;

class SendWelcomeEmail
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(AuthenticationEvent $event): void
    {
        Notification::send($event->user, new RegisterNotification);
    }
}
