<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LesformulesController extends AbstractController
{
    #[Route('/les-formules', name: 'app_lesformules')]
    public function index(): Response
    {
        return $this->render('lesformules/index.html.twig', [
            'controller_name' => 'LesformulesController',
        ]);
    }
}
