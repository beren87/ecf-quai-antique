<?php

namespace App\Service;

use App\Entity\Reservations;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Session\Flash\FlashBagInterface;
use Symfony\Component\Security\Core\Security;

class ReservationService
{
    private $security;
    private $manager;
    private $flash;

    public function __construct(EntityManagerInterface $manager, 
    FlashBagInterface $flash, 
    Security $security)
    {
        $this->manager = $manager;
        $this->flash = $flash; 
        $this->security = $security;
    }

    public function persistReservation(Reservations $reservations): void
    {
        $user = $this->security->getUser();
        $reservations->setUsers($user);
        $this->manager->persist($reservations);
        
        $this->manager->flush();
        $this->flash->add('success', 'Votre réservation à bien été prise en compte, merci');
    }
}
