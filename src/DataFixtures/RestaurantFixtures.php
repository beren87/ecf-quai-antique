<?php

namespace App\DataFixtures;

use App\Entity\Restaurant;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class RestaurantFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        
         $restaurant = new Restaurant();
         $restaurant->setAddress('124 Rue de la République')
                    ->setTelephone('04.79.60.25.31')
                    ->setMail('quai-antique@mail.fr')
                    ->setInstagram('quaiantique-chambery')
                    ->setFacebook('quaiantique-chambery')
                    ->setTwitter('@quaiantique-chambery')
                    ->setYoutube('quaiantique-chambery')
                    ->setMaxGuests(40);
         $manager->persist($restaurant);

        $manager->flush();
    }
}
