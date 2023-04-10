<?php

namespace App\Listeners;

use App\Events\PaymentEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Notification;
use App\Notifications\SuccessfullyPaymentNotification;

class SendSuccessfullyPaymentEmail
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
    public function handle(PaymentEvent $event): void
    {
        Notification::send($event->order, new SuccessfullyPaymentNotification);
    }
}
