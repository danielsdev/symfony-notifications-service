<?php

namespace App\Infrastructure\Http\Controller;

use App\Domain\UseCase\SendNotification;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CreateNotificationController extends AbstractController
{
    public function __construct(private SendNotification $sendNotification)
    {        
    }

    #[Route('/notifications', name: 'create_notification', methods:['POST'])]
    public function __invoke(Request $request): Response
    {
        $data = $request->toArray();
        $notification = $this->sendNotification->execute($data);
        
        return $this->json(
            $notification,
            Response::HTTP_CREATED,
        );
    }
}