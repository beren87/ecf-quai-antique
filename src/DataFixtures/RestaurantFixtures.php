<?php

namespace App\DataFixtures;

use App\Entity\Restaurant;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
Use Faker\Factory;

class RestaurantFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');
         $restaurant = new Restaurant();
         $restaurant->setAddress($faker->streetAddress())
                    ->setTelephone($faker->phoneNumber())
                    ->setMail($faker->email())
                    ->setInstagram('quaiantique-chambery')
                    ->setFacebook('quaiantique-chambery')
                    ->setTwitter('@quaiantique-chambery')
                    ->setYoutube('quaiantique-chambery')
                    ->setMaxGuests($faker->numberBetween(2, 40));
         $manager->persist($restaurant);

        $manager->flush();
    }
}
