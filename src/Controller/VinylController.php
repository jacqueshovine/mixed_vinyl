<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use function Symfony\Component\String\u;

class VinylController extends AbstractController
{

    #[Route('/')]
    public function homepage(): Response
    {
        $tracks = [
            ['song' => 'Song 1', 'artist' => 'Artist 1'],
            ['song' => 'Song 2', 'artist' => 'Artist 2'],
            ['song' => 'Song 3', 'artist' => 'Artist 3'],
            ['song' => 'Song 4', 'artist' => 'Artist 4'],
        ];

        // The render method returns a Response object
        return $this->render('vinyl/homepage.html.twig', [
            'title' => 'PB and Jams',
            'tracks' => $tracks,
        ]);
    }

    #[Route('/browse/{slug}')]
    public function browse(string $slug = null): Response
    {
        if ($slug) {
            $title = 'Genre: ' . u(str_replace('-', ' ', $slug))->title(true);
        } else {
            $title = 'All Genres';
        }


        return new Response($title);
    }
}
