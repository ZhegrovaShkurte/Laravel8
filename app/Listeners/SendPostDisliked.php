<?php

namespace App\Listeners;

use App\Events\PostDisliked;
use App\Mail\PostDislikedMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendPostDisliked
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
     * @param  \App\Events\PostDisliked  $event
     * @return void
     */
    public function handle(PostDisliked $event)
    {
        Mail::to('hello@example.com')->send(new PostDislikedMail($event->userName, $event->postTitle, $event->message, $event->email));
    }
}
