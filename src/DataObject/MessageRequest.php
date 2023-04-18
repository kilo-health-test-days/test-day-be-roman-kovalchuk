<?php

namespace App\DataObject;

use Symfony\Component\HttpFoundation\Request;

class MessageRequest
{
    private string $message;
    private array $channels;
    private array $customers;

    public function __construct(Request $request)
    {
        $requestData = json_decode($request->getContent());

        $this->message = $requestData->message;
        $this->channels = $requestData->channels;
        $this->customers = $requestData->customers;
    }

    /**
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * @return array
     */
    public function getChannels(): array
    {
        return $this->channels;
    }

    /**
     * @return array
     */
    public function getCustomers(): array
    {
        return $this->customers;
    }

}