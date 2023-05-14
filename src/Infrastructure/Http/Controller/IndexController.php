<?php

namespace App\Infrastructure\Http\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndexController
{
    #[Route('/index', name: 'index')]
    public function index(): Response
    {
        return new Response(
            '<html><body>Index!</body></html>'
        );        
    }
}