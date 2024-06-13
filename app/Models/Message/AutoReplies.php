<?php

namespace App\Models\Message;

use App\Jobs\GenerateReply;
use App\Models\Message;

trait AutoReplies
{
    public static function bootAutoReplies()
    {
        static::created(function (Message $message) {
            if ($message->is_from_ai) {
                $message->generateReplyLater();
            }

            if (!$message->is_from_ai) {
                $message->createReply();
            }
        });
    }

    public function generateReplyLater()
    {
        GenerateReply::dispatch($this);
    }

    public function createReply()
    {
        $this->chat->messages()->create([
            'content' => '',
            'is_from_ai' => true,
        ]);
    }
}
