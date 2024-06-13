<?php

namespace App\Jobs;

use App\Models\Message;
use App\Services\ArtificialIntelligence\Client;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class GenerateReply implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct(public readonly Message $message)
    {
    }

    public function handle(Client $ai): void
    {
        $lastMessage = $this->message->chat->messages()->latest()->whereNot('id', $this->message)->first();

        $prompt = [
            ['role' => 'user', 'content' => $lastMessage->content],
        ];

        foreach ($ai->generate($prompt) as $chunk) {
            $this->message->update(['content' => $this->message->content . $chunk]);
        }
    }
}
