<?php

namespace App\Listeners;

use App\Events\NotificationEmail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Mail\NotificationMail;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class NotificationEmailListener
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
    public function handle(NotificationEmail $event): void
    {
        $adminEmails = User::where('role', 1)->pluck('email')->toArray();
        Mail::to($adminEmails)->send(new NotificationMail($event->email));
    }
}
