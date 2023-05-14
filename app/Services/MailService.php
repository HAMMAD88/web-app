<?php

namespace App\Services;

use App\Mail\PostReacted;
use Illuminate\Support\Facades\Mail;

class MailService
{
    public function sendPostReactedMail($user, $post, $reaction)
    {
        \Mail::to($user)->send(new PostReacted($post, $reaction));
    }
}
