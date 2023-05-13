<?php

use Galka\TelegramBotLogger\Logging\TelegramLoggerFactory;

return [
    'channels' => [
        'telegram_log' => [
            'driver' => 'custom',
            'via' => TelegramLoggerFactory::class,
            'level' => env('LOG_LEVEL', 'debug'),
            'chat_id' => env('TELEGRAM_LOGGER_CHAT_ID'),
            'token' => env('TELEGRAM_LOGGER_TOKEN'),
        ],
    ]
];
