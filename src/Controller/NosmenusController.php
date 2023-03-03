<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class NosmenusController extends AbstractController
{
    #[Route('/nos-menus', name: 'app_nosmenus')]
    public function index(): Response
    {
        return $this->render('nosmenus/index.html.twig', [
            'controller_name' => 'NosmenusController',
        ]);
    }
}
