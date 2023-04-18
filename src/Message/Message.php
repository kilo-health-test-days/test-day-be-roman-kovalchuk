<?php

namespace App\Message;

use App\Entity\Customer;

class Message
{
    public function __construct(
        private readonly Customer $customer,
        private readonly string $message,
        private readonly string $channel,
    ) {}

    /**
     * @return Customer
     */
    public function getCustomer(): Customer
    {
        return $this->customer;
    }

    /**
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * @return string
     */
    public function getChannel(): string
    {
        return $this->channel;
    }
}