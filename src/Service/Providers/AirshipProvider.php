<?php

namespace App\Service\Providers;

use App\Message\Message;
use App\Service\ProviderInterface;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class AirshipProvider implements ProviderInterface
{
    private const BASE_URI = 'https://go.airship.eu/';
    private const PATH_PUSH_API = 'api/push';

    private HttpClientInterface $client;
    public function __construct(
        private readonly bool $enabled,
        private readonly string $appKey,
        private readonly string $masterSecret,
    )
    {
        $this->client = HttpClient::createForBaseUri(self::BASE_URI, [
            'auth_basic' => [$this->appKey, $this->masterSecret],
        ]);

    }

    public function send(Message $message): void
    {
        if ($this->enabled) {
            $this->client->request('POST', self::PATH_PUSH_API, [
                'headers' => ['Content-type' => 'application/json'],
                'body' => json_encode([
                    "audience" => ["ios_channel" => $message->getCustomer()->getPushChannel()],
                    "notification" => ["alert" => $message->getMessage()],
                    "device_types" => ["ios"],
                ]),
            ]);
        }
    }

    public function getChannel(): string
    {
        return 'push';
    }
}