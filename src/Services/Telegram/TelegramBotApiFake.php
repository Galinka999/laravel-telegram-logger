<?php

declare(strict_types=1);

namespace Galka\TelegramBotLogger\Services\Telegram;

final class TelegramBotApiFake extends TelegramBotApi
{
    public static $success = true;

    public function returnTrue(): static
    {
        static::$success = true;
        return $this;
    }

    public function returnFalse(): static
    {
        static::$success = false;
        return $this;
    }

    public static function sendMessage(string $token, int $chatId, string $text): bool
    {
        return static::$success;
    }
}
