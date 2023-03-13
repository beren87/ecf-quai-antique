<?php

namespace App\Controller;

use App\Repository\OpeningHourRepository;
use App\Repository\ReservationsRepository;
use App\Repository\RestaurantRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AccountUsersController extends AbstractController
{
    #[Route('/mon-compte', name: 'app_account_users')]
    public function index(RestaurantRepository $restaurantRepository, OpeningHourRepository $openingHourRepository, ReservationsRepository $reservationsRepository): Response
    {
        return $this->render('account_users/index.html.twig', [
            'restaurants' => $restaurantRepository->findBy([]), 
            'openinghours' => $openingHourRepository->findBy([]),
            'reservations' => $reservationsRepository->findBy([]),
        ]);
    }
}
