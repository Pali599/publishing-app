<?php

namespace App\Listeners;

use App\Events\UserAddedEvent;
use App\Mail\UserAddedMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendUserAddedNotification
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
    public function handle(UserAddedEvent $event): void
    {
        $user = $event->user; // Assuming the 'author' relationship exists in the Article model
        if ($user) {
            Mail::to($user->email)->send(new UserAddedMail($event->user));
        }
    }
}
