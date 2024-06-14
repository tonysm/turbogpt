<?php

use App\Models\Embedding;
use App\Services\ArtificialIntelligence\Client;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Http;
use Langchain\TextSplitter\RecursiveCharacterTextSplitter;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

Artisan::command('ingest', function (Client $ai) {
    // Load...
    $url = $this->ask('What URL do you want to embed?');
    $content = Http::get($url)->body();

    // Transform...
    $splitter = new RecursiveCharacterTextSplitter([
        'chunk_size' => 1000,
        'chunk_overlap' => 10,
    ]);

    $chunks = collect($splitter->splitText($content));

    // Embed...

    $embeddings = $ai->generateEmbeddings($chunks);

    // Store...
    foreach ($chunks as $index => $chunk) {
        Embedding::create([
            'chunk' => $chunk,
            'chunk_size' => strlen($chunk),
            'embedding' => $embeddings[$index]->embedding,
        ]);
    }

    $this->info('Done!');
})->purpose('Augment the LLM generation with external data.');
