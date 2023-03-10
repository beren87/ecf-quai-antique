<?php

namespace App\Controller;


use App\Repository\CategorieMenusRepository;
use App\Repository\MenusRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MenusController extends AbstractController
{
    #[Route('/menus', name: 'app_menus')]
    public function index(CategorieMenusRepository $categorieMenusRepository, MenusRepository $menusRepository): Response
    {
        return $this->render('menus/index.html.twig', [
            'categorieMenus' => $categorieMenusRepository->findBy([]),'menus' => $menusRepository->findBy([]),
        ]);
    }
}