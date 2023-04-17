<?php

namespace App\Providers;

use App\Events\ArticleDeletedEvent;
use App\Events\ArticleEditedEvent;
use App\Events\NotificationEmail;
use App\Events\ReviewAddedAndNotifyUserEvent;
use App\Events\ReviewerAddedEvent;
use App\Listeners\ArticleEditedNotificationListener;
use App\Listeners\NotificationEmailListener;
use App\Listeners\SendArticleDeletedNotification;
use App\Listeners\SendNotificationToReviewer;
use App\Listeners\SendNotificationToUser;
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
            SendNotificationToUser::class,
        ],
        ArticleDeletedEvent::class => [
            SendArticleDeletedNotification::class,
        ],
        ArticleEditedEvent::class => [
            ArticleEditedNotificationListener::class,
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
