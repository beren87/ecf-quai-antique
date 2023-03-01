<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class WinesController extends AbstractController
{
    #[Route('/les-vins-et-cocktails', name: 'app_wines')]
    public function index(): Response
    {
        return $this->render('wines/index.html.twig', [
            'controller_name' => 'WinesController',
        ]);
    }
}
