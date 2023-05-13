<?php

declare(strict_types=1);

namespace Galka\TelegramBotLogger\Services\Telegram;

interface TelegramBotApiContract
{
    public static function sendMessage(string $token, int $chatId, string $text): bool;
}
