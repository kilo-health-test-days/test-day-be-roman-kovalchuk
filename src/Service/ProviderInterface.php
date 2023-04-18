<?php

namespace App\Service;

use App\Message\Message;

interface ProviderInterface
{
    public function getChannel(): string;
    public function send(Message $message): void;
}