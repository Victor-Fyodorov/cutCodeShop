<?php

namespace App\Logging\Telegram;

use App\Services\Telegram\TelegramBotAPI;
use Monolog\Handler\AbstractProcessingHandler;
use Monolog\Logger;
use Monolog\LogRecord;

class TelegramLoggerHandler extends AbstractProcessingHandler
{

    protected string $chatId;
    protected string $token;

    public function __construct(array $config)
    {
        $this->chatId = $config['chat_id'];
        $this->token = $config['token'];
        $level = Logger::toMonologLevel($config['level']);
        parent::__construct($level);
    }

    protected function write(LogRecord $record): void
    {
        TelegramBotAPI::sendMessage(
            $this->token,
            $this->chatId,
            $record->formatted
        );
    }
}
