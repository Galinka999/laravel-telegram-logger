<?php

declare(strict_types=1);

namespace Galka\TelegramBotLogger\Logging;

use Monolog\Logger;

final class TelegramLoggerFactory
{
    public function __invoke(array $config): Logger
    {
        $logger = new Logger('telegram_log');

        $logger->pushHandler(new TelegramLoggerHandler($config));

        return $logger;
    }
}
