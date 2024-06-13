<?php

namespace App\Providers;

use HotwiredLaravel\TurboLaravel\Facades\Turbo;
use Illuminate\Support\ServiceProvider;
use OpenAI;
use OpenAI\Client;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(Client::class, function () {
            return OpenAI::client(config('services.openai.key'));
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Turbo::usePartialsSubfolderPattern();
    }
}
