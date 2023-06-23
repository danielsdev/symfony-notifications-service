<?php

namespace App\Infrastructure\Http\Controller;

use App\Domain\UseCase\CancelNotification;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;

#[Route('/notifications')]
class CancelNotificationController extends AbstractController
{
    public function __construct(
        private CancelNotification $cancelNotification
    ) {
    }

    #[Route('/{id}/cancel', name: 'cancel_notification', methods:['PATCH'])]
    public function __invoke(string $id): JsonResponse
    {
        $this->cancelNotification->execute($id);

        dd($id);
        
        // return $this->json(
        //     [
        //         'data' => $notifications,
        //     ],
        //     Response::HTTP_OK,
        //     context: [
        //         ObjectNormalizer::GROUPS => ['notification.collection.read'],
        //     ]
        // );
    }
}