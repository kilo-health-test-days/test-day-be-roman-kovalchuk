<?php

namespace App\Service;

use App\DataObject\MessageRequest;
use App\Message\Message;
use Symfony\Component\Messenger\MessageBusInterface;

class MessageHandler
{
    public function __construct(
        private readonly MessageBusInterface $bus,
        private readonly CustomerService $customerService,
    ) {}

    public function handle(MessageRequest $messageRequest): void
    {
        foreach ($messageRequest->getChannels() as $channel) {
            foreach ($messageRequest->getCustomers() as $customer) {
                $this->bus->dispatch(
                    new Message(
                        $this->customerService->find($customer),
                        $messageRequest->getMessage(),
                        $channel,
                    ));
            }
        }
    }
}