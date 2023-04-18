<?php

namespace App\Service;

use App\DataObject\CustomerRequest;
use App\Entity\Customer;
use Doctrine\ORM\EntityManagerInterface;

class CustomerService
{
    public function __construct(
        private readonly EntityManagerInterface $entityManager,
    ) {}

    public function create(CustomerRequest $customerRequest): Customer
    {
        $customer = new Customer();
        $customer->setPhone($customerRequest->getPhone());
        $customer->setEmail($customerRequest->getEmail());
        $customer->setPushChannel($customerRequest->getPushChannel());

        $this->entityManager->persist($customer);
        $this->entityManager->flush();

        return $customer;
    }

    public function find(int $customerId): Customer
    {
        return $this->entityManager->getRepository(Customer::class)
            ->find($customerId);
    }
}