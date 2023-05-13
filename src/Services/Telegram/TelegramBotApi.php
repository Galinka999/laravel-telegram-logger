<?php

declare(strict_types=1);

namespace Galka\TelegramBotLogger\Services\Telegram;

use Galka\TelegramBotLogger\Services\Telegram\Exceptions\TelegramBotApiException;
use Illuminate\Support\Facades\Http;
use Throwable;

class TelegramBotApi implements TelegramBotApiContract
{
    public const HOST= 'https://api.telegram.org/bot';

    public static function sendMessage(string $token, int $chatId, string $text): bool
    {
        try {
            $response = Http::post(self::HOST . $token . '/sendMessage', [
                'chat_id' => $chatId,
                'text' => $text,
            ])->throw()->json();

            return $response['ok'] ?? false;

        } catch (Throwable $e) {
            report(new TelegramBotApiException($e->getMessage()));
            return false;
        }
    }

    public function fake()
    {
        app()->instance(TelegramBotApiContract::class, new TelegramBotApiFake());
    }
}
