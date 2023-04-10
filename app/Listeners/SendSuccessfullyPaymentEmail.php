<?php

namespace App\Listeners;

use App\Events\PaymentEvent;
use App\Notifications\SuccessfullyPaymentNotification;
use Illuminate\Support\Facades\Notification;

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
