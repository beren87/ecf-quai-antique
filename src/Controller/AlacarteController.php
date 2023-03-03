<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AlacarteController extends AbstractController
{
    #[Route('/a-la-carte', name: 'app_alacarte')]
    public function index(): Response
    {
        return $this->render('alacarte/index.html.twig', [
            'controller_name' => 'AlacarteController',
        ]);
    }
}
