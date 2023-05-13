<?php

declare(strict_types=1);

namespace Galka\TelegramBotLogger\Logging;

use Galka\TelegramBotLogger\Services\Telegram\TelegramBotApi;
use Monolog\Handler\AbstractProcessingHandler;
use Monolog\Logger;
use Monolog\LogRecord;

final class TelegramLoggerHandler extends AbstractProcessingHandler
{
    protected int $chatId;
    protected string $token;

    public function __construct($config)
    {
        $this->chatId = (int) $config['chat_id'];
        $this->token = $config['token'];

        $level = Logger::toMonologLevel($config['level']);
        parent::__construct($level);
    }

    protected function write(LogRecord $record): void
    {
        TelegramBotApi::sendMessage($this->token, $this->chatId, $record->formatted);
    }
}
