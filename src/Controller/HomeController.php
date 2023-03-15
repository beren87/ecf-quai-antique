<?php

namespace App\Controller;


use App\Repository\ImagesRepository;
use App\Repository\OpeningHourRepository;
use App\Repository\RestaurantRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(ImagesRepository $imagesRepository, OpeningHourRepository $openingHourRepository ,RestaurantRepository $restaurantRepository): Response
    {
        return $this->render('home/index.html.twig', [
            'images' => $imagesRepository->treeImg(),
            'restaurants' => $restaurantRepository->findBy([]), 
            'openinghours' => $openingHourRepository->findBy([])
        ]);
    }
}
