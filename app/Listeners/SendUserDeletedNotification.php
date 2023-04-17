<?php

namespace App\Listeners;

use App\Events\UserDeletedEvent;
use App\Mail\UserDeletedMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendUserDeletedNotification
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
    public function handle(UserDeletedEvent $event): void
    {
        $user = $event->user; // Assuming the 'author' relationship exists in the Article model
        if ($user) {
            Mail::to($user->email)->send(new UserDeletedMail($event->user));
        }
    }
}
