<?php

namespace App\DataFixtures;

use App\Entity\Dishes;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
Use Faker\Factory;

class DishesFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');
        
        $dishe = new Dishes();
        $dishe->setName($faker->text(5));
        

        // $manager->persist($product);

        $manager->flush();
    }
}
