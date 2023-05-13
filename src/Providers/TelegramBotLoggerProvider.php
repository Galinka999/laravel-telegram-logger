<?php

namespace Galka\TelegramBotLogger\Providers;

use Galka\TelegramBotLogger\Services\Telegram\TelegramBotApi;
use Galka\TelegramBotLogger\Services\Telegram\TelegramBotApiContract;
use Illuminate\Support\ServiceProvider;

class TelegramBotLoggerProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->app->bind(TelegramBotApiContract::class, TelegramBotApi::class);

    }
}
