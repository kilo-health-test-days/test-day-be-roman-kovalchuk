<?php

namespace App\Controller;

use App\DataObject\CustomerRequest;
use App\Service\CustomerService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/customer', name: 'customer-register', methods: ['POST'])]
class CustomerController extends AbstractController
{
    public function __invoke(
        Request $request,
        CustomerService $customerService,
    ): JsonResponse
    {
        $customerRequest = new CustomerRequest($request);
        $customer = $customerService->create($customerRequest);

        return new JsonResponse([
            'status' => 'ok',
            'id' => $customer->getId(),
        ]);
    }
}