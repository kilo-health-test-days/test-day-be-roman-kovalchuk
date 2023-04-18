<?php

namespace App\Service\Providers;

use App\Message\Message;
use App\Service\ProviderInterface;
use Twilio\Exceptions\ConfigurationException;
use Twilio\Rest\Client;

class TwillioProvider implements ProviderInterface
{
    private Client $client;

    /**
     * @throws ConfigurationException
     */
    public function __construct(
        private readonly bool $enabled,
        private readonly string $accountSID,
        private readonly string $authToken,
        private readonly string $senderPhoneNumber,
    )
    {
        $this->client = new Client($this->accountSID, $this->authToken);
    }

    public function send(Message $message): void
    {
        if ($this->enabled) {
            $this->client->messages->create(
                $message->getCustomer()->getPhone(),
                [
                    'from' => $this->senderPhoneNumber,
                    'body' => $message->getMessage()
                ]
            );
        }
    }

    public function getChannel(): string
    {
        return 'sms';
    }
}