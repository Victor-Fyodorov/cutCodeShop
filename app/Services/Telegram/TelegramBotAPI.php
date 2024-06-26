<?php

namespace App\Services\Telegram;

use Illuminate\Support\Facades\Http;

class TelegramBotAPI
{
    public const HOST ='https://api.telegram.org/bot';

    public static function sendMessage(string $token, string $chatId, string $text)
    {
        Http::get(self::HOST . $token . '/sendMessage', [
            'chat_id' => $chatId,
            'text' => $text,
        ]);
    }
}
