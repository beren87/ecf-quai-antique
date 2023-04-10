<?php

namespace App\Controller;

use App\Entity\Reservations;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Form\ReservationsFormType;
use App\Repository\OpeningHourRepository;
use App\Repository\RestaurantRepository;
use App\Service\ReservationService;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ReservationsController extends AbstractController 
{
    #[Route('/reservations', name: 'app_reservations')]
    public function index(Request $request, 
    RestaurantRepository $restaurantRepository,
    ReservationService $reservationService, 
    OpeningHourRepository $openingHourRepository): Response
    {   
       //création d'une réservation
       $reservations = new Reservations();   
        
        
       //création du formulaire
       $reservationForm = $this->createForm(ReservationsFormType::class, $reservations);

       //traite de la requete du formulaire
       $reservationForm->handleRequest($request);  
       
       //Si Formulaire soumis et valide, alors on ajoute l'objet $reservations dans la BDD
       if ($reservationForm ->isSubmitted() && $reservationForm->isValid()){
           $reservations = $reservationForm->getData();
   
           $reservationService->persistReservation($reservations);
           return $this->redirectToRoute('app_reservations');
          
           }
           return $this->render('reservations/index.html.twig', [
               'reservationForm' => $reservationForm->createView(),
               'restaurants' => $restaurantRepository->findBy([]),
               'openinghours' => $openingHourRepository->findBy([])
           ]);             
   }
}
