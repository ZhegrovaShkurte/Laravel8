<?php

namespace App\Providers;

use App\Events\PostLiked;
use App\Events\PostDisliked;
use App\Listeners\SendPostLiked;
use App\Listeners\SendPostDisliked;
use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

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

        
           PostLiked::class => [
            SendPostLiked::class
           ],
        PostDisliked::class => [
            SendPostDisliked::class
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        Event::listen(
            PostLiked::class,
            [SendPostLiked::class, 'handle']
        );

        Event::listen(
            PostDisliked::class,
            [SendPostDisliked::class, 'handle']
        );
     
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return false;
    }
}
