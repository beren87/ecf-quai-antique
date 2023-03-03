<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CremchampController extends AbstractController
{
    #[Route('/cremants-champagnes', name: 'app_cremchamp')]
    public function index(): Response
    {
        return $this->render('cremchamp/index.html.twig', [
            'controller_name' => 'CremchampController',
        ]);
    }
}
