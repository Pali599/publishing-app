<?php

namespace App\Mail;

use App\Models\Article;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ArticleEditedNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $article;

    /**
     * Create a new message instance.
     */
    public function __construct(Article $article)
    {
        $this->article = $article;
    }

    public function build()
    {
        return $this->view('emails.articleEdited')
            ->subject('Article was Edited')
            ->with('article', $this->article);
    }
}
