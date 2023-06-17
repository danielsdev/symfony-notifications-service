<?php

namespace App\Infrastructure\Http\Controller;

use App\Domain\UseCase\GetRecipientNotifications;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;

#[Route('/notifications')]
class GetFromRecipientController extends AbstractController
{
    public function __construct(
        private GetRecipientNotifications $getRecipientNotifications
    ) {
    }

    #[Route('/from/{recipientId}', name: 'get_from_recipient', methods:['GET'])]
    public function __invoke(string $recipientId): JsonResponse
    {
        $notifications = $this->getRecipientNotifications->execute($recipientId);
        
        return $this->json(
            [
                'data' => $notifications,
            ],
            Response::HTTP_OK,
            context: [
                ObjectNormalizer::GROUPS => ['notification.collection.read'],
            ]
        );
    }
}