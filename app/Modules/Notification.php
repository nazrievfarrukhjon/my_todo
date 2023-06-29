<?php

namespace App\Modules;

use GuzzleHttp\Client as Guzzle;

class Notification
{
    public static function sendToTelegram(array $params): void
    {
        $guzzle = new Guzzle();
        $guzzle->post('https://api.telegram.org/bot' . config('telegram.TELEGRAM_BOT_TOKEN') . '/sendMessage',
            [
                'form_params' => [
                    'chat_id' => config('telegram.TELEGRAM_CHAT_ID'),
                    'text' => json_encode($params),
                ]
            ]
        );

    }
}
