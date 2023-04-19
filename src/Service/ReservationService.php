<?php

namespace App\Service;

use App\Entity\Reservations;
use App\Repository\ReservationsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Core\Security;

class ReservationService 
{
    private $security;
    private $manager;
    private $reservationRepository;


    public function __construct(EntityManagerInterface $manager,   
    Security $security, ReservationsRepository $reservationRepository)
    {
        $this->manager = $manager;
        $this->security = $security;
        $this->reservationRepository = $reservationRepository;
        
    }

        public function findReservationsByHour($hour, $date): array
    {
        $reservationsRepository = $this->manager->getRepository(Reservations::class);
        $reservations = $reservationsRepository->findBy(['date' => $date, 'hours' => $hour]);

        return $reservations;
    }

    public function findReservationByDateAndDifferentHour(\DateTimeInterface $date, \DateTimeInterface $hour): ?Reservations
    {
        $reservations = $this->manager->getRepository(Reservations::class)->findByDate($date);

        foreach ($reservations as $reservation) {
            if ($reservation->getHours() != $hour) {
                return $reservation;
            }
        }

    return null;
    }

    public function findReservationsByDateAndDifferentHour(\DateTime $date, \DateTime $hour): array
{
    return $this->manager->getRepository(Reservations::class)
        ->createQueryBuilder('r')
        ->where('r.date = :date')
        ->andWhere('r.hours != :hour')
        ->setParameter('date', $date)
        ->setParameter('hour', $hour)
        ->getQuery()
        ->getResult();
}

    public function findReservationsByDate(\DateTimeInterface $date): array
    {
        $formattedDate = $date->format('Y-m-d H:i:s');
        $reservations = $this->reservationRepository->createQueryBuilder('r')
            ->where('r.date = :date')
            ->setParameter('date', $formattedDate)
            ->getQuery()
            ->getResult();

        return $reservations;
    }

    public function countGuestsByDate(\DateTimeInterface $date): int
    {
        $formattedDate = $date->format('Y-m-d');
        $reservations = $this->reservationRepository->createQueryBuilder('r')
            ->select('SUM(r.numberGuests)')
            ->where('r.date LIKE :date')
            ->setParameter('date', $formattedDate.'%')
            ->getQuery()
            ->getSingleScalarResult();

        return $reservations ?: 0;
    }

    public function getAvailablePlacesByDate(\DateTime $date): int
    {
        // Obtient toutes les réservations pour la date spécifiée
        $reservations = $this->manager->getRepository(Reservations::class)->findBy(['date' => $date]);
    
        // Calcule le nombre total de places réservées pour cette date
        $reservedPlaces = 0;
        foreach ($reservations as $reservation) {
            $reservedPlaces += $reservation->getNumberGuests();
        }
    
        // Calcule les places disponibles à cette date
        $totalPlaces = 40; 
        $availablePlaces = $totalPlaces - $reservedPlaces;
    
        return $availablePlaces;
    }
    

    public function persistReservation(Reservations $reservations): void
    {
       
        $user = $this->security->getUser();
        $reservations->setUsers($user);
        $this->manager->persist($reservations);
        $this->manager->flush();
        
    }
}
