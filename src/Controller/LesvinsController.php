<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LesvinsController extends AbstractController
{
    #[Route('/les-vins', name: 'app_lesvins')]
    public function index(): Response
    {
        return $this->render('lesvins/index.html.twig', [
            'controller_name' => 'LesvinsController',
        ]);
    }
}
