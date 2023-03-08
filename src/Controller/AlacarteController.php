<?php

namespace App\Controller;

use App\Repository\CategorieRepository;
use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AlacarteController extends AbstractController
{
    #[Route('/a-la-carte', name: 'app_alacarte')]
    public function index(CategorieRepository $categorieRepository): Response
    {
        return $this->render('alacarte/index.html.twig', [
            'categorie' => $categorieRepository->findOneBy([]),
        ]);
    }
}
