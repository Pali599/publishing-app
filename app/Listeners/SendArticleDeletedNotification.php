<?php

namespace App\Listeners;

use App\Events\ArticleDeletedEvent;
use App\Mail\ArticleDeletedMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendArticleDeletedNotification
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
    public function handle(ArticleDeletedEvent $event): void
    {
        $author = $event->article->author; // Assuming the 'author' relationship exists in the Article model
        if ($author) {
            Mail::to($author->email)->send(new ArticleDeletedMail($event->article));
        }
    }
}
