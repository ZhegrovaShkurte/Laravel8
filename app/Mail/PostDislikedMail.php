<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PostDislikedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $userName;
    public $postTitle;
    public $message;
    public $email;

    /**
     * Create a new message instance.
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
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'Post Disliked Mail',
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            view: 'emails.post-disliked',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}
