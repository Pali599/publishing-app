<?php

namespace App\Listeners;

use App\Events\ReviewEditedEvent;
use App\Mail\ReviewEditedNotifyAdmin;
use App\Mail\ReviewEditedNotifyUser;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendReviewEditedNotification
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
    public function handle(ReviewEditedEvent $event): void
    {
        $createdBy = $event->review->article->created_by; // Assuming 'reviewer_int' is a column in the Article model

        $author = User::where('id', $createdBy)->first();

        Mail::to($author->email)->send(new ReviewEditedNotifyUser($event->review));
        
        $adminUsers = User::where('role_id', 1)->get(); // assuming role_id 1 is for admin users
        foreach ($adminUsers as $adminUser) {
            Mail::to($adminUser->email)->send(new ReviewEditedNotifyAdmin($event->review));
        }
    }
}
