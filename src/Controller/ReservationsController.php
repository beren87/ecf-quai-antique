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

            // Récupérer la date et l'heure depuis l'objet $reservations
            $date = $reservations->getDate();
            $hour = $reservations->getHours();

            // Vérifier si une autre réservation existe pour la même date et heure différente
            $conflictingReservations = $reservationService->findReservationsByDateAndDifferentHour($date, $hour);

            if (!empty($conflictingReservations)) {
                $this->addFlash('error', 'Vous avez déjà une réservation pour cette journée. Veuillez choisir une autre heure.');
                return $this->redirectToRoute('app_reservations');
            }

            // Vérifier si une autre réservation existe pour la même heure
            $conflictReservations = $reservationService->findReservationsByHour($hour, $date);

            if (!empty($conflictReservations)) {
                $conflictingHours = [];
                foreach ($conflictReservations as $conflictReservation) {
                    $conflictingHours[] = $conflictReservation->getHours()->format('H:i');;
                }
                $this->addFlash('error', 'La plage horaire de ' . $hour->format('H:i') . ' est déjà réservée. Veuillez choisir une autre plage horaire. Les heures déjà réservées sont : ' . implode(', ', $conflictingHours) . '.');
                return $this->redirectToRoute('app_reservations');
            }

            // Vérifier si toutes les heures pour cette journée ont été réservées
            $allOpeningHours = $openingHourRepository->findAll();
            $reservedHours = $reservationService->findReservationsByDate($date);
            $availableHours = array_diff($allOpeningHours, $reservedHours);

            if (empty($availableHours)) {
                $this->addFlash('error', 'Toutes les heures pour cette journée ont été réservées. Veuillez choisir une autre journée.');
                return $this->redirectToRoute('app_reservations');
            }
            
            $reservationService->persistReservation($reservations);
            $this->addFlash('success', 'Votre réservation a été enregistrée avec succès !');
            return $this->redirectToRoute('app_reservations');
          
           }
           return $this->render('reservations/index.html.twig', [
               'reservationForm' => $reservationForm->createView(),
               'restaurants' => $restaurantRepository->findBy([]),
               'openinghours' => $openingHourRepository->findBy([])
           ]);             
   }
}
