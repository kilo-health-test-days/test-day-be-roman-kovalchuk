<?php

namespace App\Controller;

use App\DataObject\MessageRequest;
use App\Service\MessageHandler;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Twilio\Rest\Client;
use UrbanAirship\Airship;
use UrbanAirship\AirshipException;

#[Route('/message', name: 'message', methods: ['POST'])]
class MessageController extends AbstractController
{
    public function __invoke(
        Request $request,
        MessageHandler $handler,
    ): JsonResponse
    {
        $messageRequest = new MessageRequest($request);

        try {
            $handler->handle($messageRequest);

            return new JsonResponse([
                'status' => true,
            ]);
        } catch (Exception $exception) {
            return new JsonResponse([
                'status' => false,
                'error' => $exception->getMessage(),
            ]);
        }
    }
}