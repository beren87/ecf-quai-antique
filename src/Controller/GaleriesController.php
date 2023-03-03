<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GaleriesController extends AbstractController
{
    #[Route('/galeries', name: 'app_galeries')]
    public function index(): Response
    {
        return $this->render('galeries/index.html.twig', [
            'controller_name' => 'GaleriesController',
        ]);
    }
}
