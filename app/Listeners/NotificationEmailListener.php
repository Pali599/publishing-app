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
    use InteractsWithQueue;
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
    public function handle(NotificationEmail $event)
    {
        $admins = User::where('role_id', '1')->get();
        $article = $event->article;

        foreach ($admins as $admin) {
            Mail::to($admin->email)->send(new NotificationMail($article));
        }
    }
}
