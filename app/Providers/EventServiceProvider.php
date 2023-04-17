<?php

namespace App\Providers;

use App\Events\ArticleDeletedEvent;
use App\Events\UserAddedEvent;
use App\Events\ArticleEditedEvent;
use App\Events\NotificationEmail;
use App\Events\ReviewAddedAndNotifyUserEvent;
use App\Events\ReviewDeletedEvent;
use App\Events\ReviewEditedEvent;
use App\Events\ReviewerAddedEvent;
use App\Events\UserDeletedEvent;
use App\Listeners\ArticleEditedNotificationListener;
use App\Listeners\SendUserAddedNotification;
use App\Listeners\NotificationEmailListener;
use App\Listeners\SendArticleDeletedNotification;
use App\Listeners\SendNotificationToReviewer;
use App\Listeners\SendReviewAddedNotification;
use App\Listeners\SendReviewDeletedNotification;
use App\Listeners\SendReviewEditedNotification;
use App\Listeners\SendUserDeletedNotification;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        NotificationEmail::class => [
            NotificationEmailListener::class,
        ],
        ReviewerAddedEvent::class => [
            SendNotificationToReviewer::class,
        ],
        ReviewAddedAndNotifyUserEvent::class => [
            SendReviewAddedNotification::class,
        ],
        ArticleDeletedEvent::class => [
            SendArticleDeletedNotification::class,
        ],
        ReviewDeletedEvent::class => [
            SendReviewDeletedNotification::class,
        ],
        ArticleEditedEvent::class => [
            ArticleEditedNotificationListener::class,
        ],
        UserAddedEvent::class => [
            SendUserAddedNotification::class,
        ],
        ReviewEditedEvent::class => [
            SendReviewEditedNotification::class,
        ],
        UserDeletedEvent::class => [
            SendUserDeletedNotification::class,
        ],
    ];
    

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
