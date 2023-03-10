<?php

namespace App\Controller;

use App\Repository\RestaurantRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ChefController extends AbstractController
{
    #[Route('/le-chef', name: 'app_chef')]
    public function index(RestaurantRepository $restaurantRepository): Response
    {
        return $this->render('chef/index.html.twig', [
            'controller_name' => 'ChefController',
            'restaurants' => $restaurantRepository->findBy([]),
        ]);
    }
}
