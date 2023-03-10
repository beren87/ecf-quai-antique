<?php

namespace App\Controller;

use App\Repository\ImagesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GaleriesController extends AbstractController
{
    #[Route('/galeries', name: 'app_galeries')]
    public function index(ImagesRepository $imagesRepository): Response
    {
        return $this->render('galeries/index.html.twig', [
            'images' => $imagesRepository->findBy([]),
        ]);
    }
}
