<?php

namespace App\Events;

use App\Models\Post;
use App\Models\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class PostDisliked
{
    use Dispatchable, InteractsWithSockets, SerializesModels;


    public $userName;
    public $postTitle;
    public $message;
    public $email;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($userName, $postTitle, $message, $email)
    {
        $this->userName = $userName;
        $this->postTitle = $postTitle;
        $this->message = $message;
        $this->email = $email;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
