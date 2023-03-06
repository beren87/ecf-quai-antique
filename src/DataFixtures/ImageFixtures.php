<?php

namespace App\DataFixtures;

use App\Entity\Image;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
Use Faker\Factory;

class ImageFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');
         $image = new Image();
         $image->setTitle($faker->text(5))
               ->setDescription($faker->text(15));
         $manager->persist($image);

        $manager->flush();
    }
}
