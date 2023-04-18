<?php

namespace App\MessageHandler;

use App\Message\Message;
use App\Service\Providers\AirshipProvider;
use App\Service\Providers\TwillioProvider;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
class MessageHandler
{
    public function __construct(
        private readonly AirshipProvider $pushProvider,
        private readonly TwillioProvider $smsProvider,
    ) {}

    public function __invoke(Message $message): void
    {
        switch ($message->getChannel()) {
            case 'push':
                $this->pushProvider->send($message);
                break;
            case 'sms':
                $this->smsProvider->send($message);
                break;
        }
    }
}