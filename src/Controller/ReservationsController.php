<?php

namespace App\Controller;

use App\Entity\Reservations;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Form\ReservationsFormType;
use App\Repository\OpeningHourRepository;
use App\Repository\RestaurantRepository;
use App\Service\ReservationService;
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
        $date = new \DateTime('now');
        $date->modify('+1 day'); // modification de la date pour obtenir celle du lendemain
        $availablePlaces = $reservationService->getAvailablePlacesByDate($date);

       //création d'une réservation
       $reservations = new Reservations();   

       //création du formulaire
       $reservationForm = $this->createForm(ReservationsFormType::class, $reservations);

       //traite de la requete du formulaire
       $reservationForm->handleRequest($request);  
       
       //Si le formulaire est soumis et valide, alors on ajoute l'objet $reservations dans la BDD
       if ($reservationForm ->isSubmitted() && $reservationForm->isValid()){
           $reservations = $reservationForm->getData();

            // Récupérer la date et l'heure depuis l'objet $reservations
            $date = $reservations->getDate();
            $hour = $reservations->getHours();

             // Vérifie que la date est différente de dimanche (0 pour dimanche, 1 pour lundi, etc.)
             $dayOfWeek = (int)$reservations->getDate()->format('w');
             if ($dayOfWeek === 0) {
                 $this->addFlash('error', 'Le restaurant est fermé le dimanche.');
                 return $this->redirectToRoute('app_reservations');
             }

            // Vérifie si le nombre total de convives pour cette date est supérieur ou égal à 40
            $totalGuests = $reservationService->countGuestsByDate($date);
            if ($totalGuests + $reservations->getNumberGuests() > 40) {
                $this->addFlash('error', 'Le nombre total de convives pour cette journée a atteint sa limite de 40. Veuillez choisir une autre journée.');
                return $this->redirectToRoute('app_reservations');
            }else {
                $availablePlaces = 40 - $totalGuests;
                if ($availablePlaces > 0 && $availablePlaces < 5) {
                    $this->addFlash('warning', 'Il ne reste plus que ' . $availablePlaces . ' places disponibles pour cette journée.');
                } elseif ($availablePlaces == 0) {
                    $this->addFlash('error', 'Il n\'y a plus de places disponibles pour cette journée. Veuillez choisir une autre journée.');
                    return $this->redirectToRoute('app_reservations');
                }
            }

            // Vérifie si une autre réservation existe pour la même date et heure différente
            $conflictingReservations = $reservationService->findReservationsByDateAndDifferentHour($date, $hour);

            if (!empty($conflictingReservations)) {
                $this->addFlash('error', 'Vous avez déjà une réservation pour cette journée. Veuillez choisir une autre heure.');
                return $this->redirectToRoute('app_reservations');
            }

            // Vérifie si une autre réservation existe pour la même heure
            $conflictReservations = $reservationService->findReservationsByHour($hour, $date);

            if (!empty($conflictReservations)) {
                $conflictingHours = [];
                foreach ($conflictReservations as $conflictReservation) {
                    $conflictingHours[] = $conflictReservation->getHours()->format('H:i');;
                }
                $this->addFlash('error', 'La plage horaire de ' . $hour->format('H:i') . ' est déjà réservée. Veuillez choisir une autre plage horaire. Les heures déjà réservées sont : ' . implode(', ', $conflictingHours) . '.');
                return $this->redirectToRoute('app_reservations');
            }

            // Vérifie si toutes les heures pour cette journée ont été réservées
            $allOpeningHours = $openingHourRepository->findAll();
            $reservedHours = $reservationService->findReservationsByDate($date);
            $availableHours = array_diff($allOpeningHours, $reservedHours);

            if (empty($availableHours)) {
                $this->addFlash('error', 'Toutes les heures pour cette journée ont été réservées. Veuillez choisir une autre journée.');
                return $this->redirectToRoute('app_reservations');
            }

            $reservationService->persistReservation($reservations);

            $this->addFlash('success', 'Votre réservation a été enregistrée avec succès ! Vous pouvez faire une autre réservation ou voir vos réservations dans l\'onglet "Vos réservations"');
            return $this->redirectToRoute('app_reservations');
           }

           return $this->render('reservations/index.html.twig', [
               'reservationForm' => $reservationForm->createView(),
               'restaurants' => $restaurantRepository->findBy([]),
               'openinghours' => $openingHourRepository->findBy([]),
               'availablePlaces' => $availablePlaces,
           ]);
   }
}
