<?php

namespace App\DataFixtures;

use App\Entity\Categories;
use Doctrine\Bundle\FixturesBundle\Fixture; 
use Doctrine\Persistence\ObjectManager;
Use Faker\Factory;

class CategoriesFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');

        $category = new Categories();
        $category->setTitle('Entrées');
        $category->setDescription($faker->text());

        for($cat = 1; $cat <=10; $cat++){
            $category = new Categories();
            $category->setTitle($faker->text(15));
            $category->setDescription($faker->text());
            $category->setPrice($faker->numberBetween(11, 55));

            $manager->persist($category);
        }
        $manager->flush();
    }
}
