<?php

namespace App\Jobs;

use App\Models\Embedding;
use App\Models\Message;
use App\Services\ArtificialIntelligence\Client;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Pgvector\Vector;

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
            ['role' => 'system', 'content' => 'You are a PHP expert. You know the Laravel framework. You are kind and funny. You answer in 200 words or less.'],
            ['role' => 'system', 'content' => 'Use this context: ' . $this->message->chat->messages()->latest()->whereNot('id', $this->message)->pluck('content')->join(' ')],
            ['role' => 'system', 'content' => 'Use this extra context: ' . $this->retrieveEmbeddingsFor($lastMessage, $ai)],
            ['role' => 'user', 'content' => $lastMessage->content],
        ];

        foreach ($ai->generate($prompt) as $chunk) {
            $this->message->update(['content' => $this->message->content . $chunk]);
        }

        if ($this->message->chat->messages()->count() === 2) {
            $this->generateTitle($ai);
        }
    }

    private function retrieveEmbeddingsFor(Message $message, Client $ai): string
    {
        $embedding = $ai->generateEmbeddings($message->content)[0]->embedding;

        return Embedding::query()
            ->orderByRaw('embedding <-> ?', [new Vector($embedding)])
            ->take(3)
            ->pluck('chunk')
            ->join(' ');
    }

    private function generateTitle(Client $ai): void
    {
        $prompt = [
            ['role' => 'system', 'content' => 'You are master at summarization. Summarize the following content in 5 words or so.'],
            ['role' => 'user', 'content' => $this->message->chat->messages()->latest()->pluck('content')->join(' ')],
        ];

        $title = "";

        foreach ($ai->generate($prompt) as $chunk) {
            $title .= $chunk;
        }

        $this->message->chat->update([
            'title' => $title,
        ]);
    }
}
