<?php

namespace App\Listeners;

use App\Events\NotificationEmail;
use App\Events\ReviewerAddedEvent;
use App\Mail\ReviewerAddedNotification;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendNotificationToReviewer
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
    public function handle(ReviewerAddedEvent $event): void
    {
        $reviewerIntId = $event->article->reviewer_int; // Assuming 'reviewer_int' is a column in the Article model
        $reviewerExtId = $event->article->reviewer_ext; // Assuming 'reviewer_ext' is a column in the Article model

        $reviewers = User::whereIn('id', [$reviewerIntId, $reviewerExtId])->get();

        foreach ($reviewers as $reviewer) {
            if ($reviewer) {
                Mail::to($reviewer->email)->send(new ReviewerAddedNotification($event->article));
            }
        }
    }
}
