<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ValidReservationController extends AbstractController
{
    #[Route('/reservation-valide', name: 'app_valid_reservation')]
    public function index(): Response
    {
        return $this->render('valid_reservation/index.html.twig', [
            'controller_name' => 'ValidReservationController',
        ]);
    }
}
