<?php

namespace App\Controller;

use Twig\Environment;
use App\Entity\Conference;
use App\Repository\CommentRepository;
use App\Repository\ConferenceRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[AsController]
class ConferenceController
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

    #[Route('/conference', name: 'app_conference')]
    public function list(Environment $twig, ConferenceRepository $repo): Response
    {
        return new Response($twig->render('conference/index.html.twig', [
            'conferences' => $repo->findAll(),
            'controller_name' => 'ConferenceController'
        ]));
    }

    #[Route('/conference/{id}', name: 'conference')]
    public function show(Environment $twig, Conference $conference, CommentRepository $commentRepository): Response
    {
        return new Response($twig->render('conference/show.html.twig', [
            'conference' => $conference,
            'comments' => $commentRepository->findBy(['conference' => $conference], ['createdAt' => 'DESC']),
        ]));
    }
}
