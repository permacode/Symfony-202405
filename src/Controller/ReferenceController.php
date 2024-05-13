<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ReferenceController extends AbstractController
{
    #[Route('/', name: 'homepage')]
    public function index(): Response
    {
        return new Response(<<<EOF
        <html>
            <style>img {margin-left:50%; margin-top: 15%;}</style>
            <body><img src="images/under-construction.gif"></body>
        </html>
    EOF);
    }
}
