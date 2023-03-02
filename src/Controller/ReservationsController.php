<?php

namespace App\Controller;

use App\Entity\Reservations;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Form\ReservationsFormType; 
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Routing\Annotation\Route;

class ReservationsController extends AbstractController
{
    #[Route('/reservations', name: 'app_reservations')]
    public function index(Request $request, EntityManagerInterface $em, ): Response
    {
        //création d'une réservation
        $reservation = new Reservations();   

        //création du formulaire
        $reservationForm = $this->createForm(ReservationsFormType::class, $reservation);

        //traite de la requete du formulaire
        $reservationForm->handleRequest($request);    

        return $this->render('reservations/index.html.twig', [
            'reservationForm' => $reservationForm->createView()
        ]);
    }
}
