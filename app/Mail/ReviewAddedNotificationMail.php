<?php

namespace App\Mail;

use App\Models\Article;
use App\Models\Review;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ReviewAddedNotificationMail extends Mailable
{
    use Queueable, SerializesModels;


    public $review;
    /**
     * Create a new message instance.
     */
    public function __construct(Review $review)
    {
        $this->review = $review;
    }

    public function build()
    {
        return $this->view('emails.reviewAdded')
            ->subject('Article reviewed')
            ->with('article', $this->review);
    }
}
