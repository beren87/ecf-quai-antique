<?php

namespace App\DataFixtures;

use App\Entity\OpeningHour;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class OpeningHourFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
         $openhour = new OpeningHour();
         $openhour->setDays('Lundi au Vendredi midi');
         $openhour->setHours('12:00 - 14:00');
         $manager->persist($openhour);

         $openhour = new OpeningHour();
         $openhour->setDays('Lundi au Vendredi soir');
         $openhour->setHours('19:00 - 22:00');
         $manager->persist($openhour);

         $openhour = new OpeningHour();
         $openhour->setDays('Dimanche et Mercredi midi');
         $openhour->setHours('12:00 - 14:00');
         $manager->persist($openhour);

        $manager->flush();
    }
}
