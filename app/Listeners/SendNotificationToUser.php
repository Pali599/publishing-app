<?php

namespace App\Listeners;

use App\Events\ReviewAddedAndNotifyUserEvent;
use App\Mail\ReviewAddedNotificationMail;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendNotificationToUser
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
    public function handle(ReviewAddedAndNotifyUserEvent $event): void
    {
        $createdBy = $event->article->created_by; // Assuming 'reviewer_int' is a column in the Article model

        $author = User::where('id', $createdBy)->first();

        Mail::to($author->email)->send(new ReviewAddedNotificationMail($event->article));
    }
}
