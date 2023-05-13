<?php

namespace App\Mail;
use App\Models\Post;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PostReacted extends Mailable
{
    use Queueable, SerializesModels;

    use Queueable, SerializesModels;

    public $post;
    public $reaction;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Post $post, string $reaction)
    {
        $this->post = $post;
        $this->reaction = $reaction;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.post.reacted')
                    ->subject('Someone reacted to your post');
    }
}
