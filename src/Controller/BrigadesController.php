<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BrigadesController extends AbstractController
{
    #[Route('/la-brigade', name: 'app_brigades')]
    public function index(): Response
    {
        return $this->render('brigades/index.html.twig', [
            'controller_name' => 'BrigadesController',
        ]);
    }
}
