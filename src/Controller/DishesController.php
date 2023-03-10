<?php

namespace App\Controller;

use App\Entity\Categorie;
use App\Repository\CategorieRepository;
use App\Repository\DisheRepository;
use App\Repository\RestaurantRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DishesController extends AbstractController
{
    #[Route('/la-carte', name: 'app_dishes')]
    public function index(CategorieRepository $categorieRepository, DisheRepository $disheRepository, RestaurantRepository $restaurantRepository): Response 
    {
        return $this->render('dishes/index.html.twig', [
            'categories' => $categorieRepository->findBy([]), 
            'dishes' => $disheRepository->findBy([]),
            'restaurants' => $restaurantRepository->findBy([]),
        ]);
    }
  
}
