<?php

namespace App\Controller;

use App\Repository\OpeningHourRepository;
use App\Repository\RestaurantRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BrigadesController extends AbstractController
{
    #[Route('/la-brigade', name: 'app_brigades')]
    public function index(RestaurantRepository $restaurantRepository, OpeningHourRepository $openingHourRepository): Response
    {
        return $this->render('brigades/index.html.twig', [
            'controller_name' => 'BrigadesController',
            'restaurants' => $restaurantRepository->findBy([]),
            'openinghours' => $openingHourRepository->findBy([])
        ]);
    }
}
