<?php

namespace App\Listeners;

use App\Events\PostLiked;
use App\Mail\PostLikedMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendPostLiked
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\PostLiked  $event
     * @return void
     */
    public function handle(PostLiked $event)
    {
        Mail::to('hello@example.com')->send(new PostLikedMail($event->userName, $event->postTitle, $event->message, $event->email));

    }
}

