<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class NoscocktailsController extends AbstractController
{
    #[Route('/nos-cocktails', name: 'app_noscocktails')]
    public function index(): Response
    {
        return $this->render('noscocktails/index.html.twig', [
            'controller_name' => 'NoscocktailsController',
        ]);
    }
}
