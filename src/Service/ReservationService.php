<?php

namespace App\Service;

use App\Entity\Reservations;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Session\Flash\FlashBagInterface;

class ReservationService
{
    private $manager;
    private $flash;

    public function __construct(EntityManagerInterface $manager, FlashBagInterface $flash)
    {
        $this->manager = $manager;
        $this->flash = $flash;
    }

    public function persistReservation(Reservations $reservations): void
    {
        $this->manager->persist($reservations);
        $this->manager->flush();
        $this->flash->add('success', 'Votre réservation à bien été prise en compte, merci.');
    }
}
