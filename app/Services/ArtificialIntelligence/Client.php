<?php

namespace App\Services\ArtificialIntelligence;

class Client
{
    public function generate($prompt, $callback)
    {
        foreach (['This', ' **message**', ' was', ' generated!'] as $chunk) {
            $callback($chunk);
            usleep(300_000);
        }
    }
}
