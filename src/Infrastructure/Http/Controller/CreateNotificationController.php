<?php

namespace App\Infrastructure\Http\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CreateNotificationController
{
    #[Route('/notifications', name: 'create_notification', methods:['POST'])]
    public function __invoke(): Response
    {
        return new Response(
            '<html><body>Create notification!</body></html>'
        );        
    }
}