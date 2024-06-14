<?php

namespace App\Services\ArtificialIntelligence;

use Generator;
use OpenAI\Client as OpenAIClient;

class Client
{
    public function __construct(private OpenAIClient $ai)
    {
    }

    public function generate($prompt): Generator
    {
        $stream = $this->ai->chat()->createStreamed([
            'model' => 'gpt-4o',
            'messages' => $prompt,
            'temperature' => 0.5,
        ]);

        foreach ($stream as $reply) {
            if ($content = ($reply->choices[0]->toArray()['delta']['content'] ?? null)) {
                yield $content;
            }
        }
    }

    public function generateEmbeddings($input): array
    {
        return $this->ai->embeddings()->create([
            'model' => 'text-embedding-3-large',
            'input' => $input,
        ])->embeddings;
    }
}
