<?php

namespace App\Listeners;

use App\Events\ReviewDeletedEvent;
use App\Mail\ReviewDeletedMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendReviewDeletedNotification
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
    public function handle(ReviewDeletedEvent $event): void
    {
        $reviewer = $event->review->reviewer; // Assuming the 'user' relationship exists in the Article model
        if ($reviewer) {
            Mail::to($reviewer->email)->send(new ReviewDeletedMail($event->review));
        }
    }
}
