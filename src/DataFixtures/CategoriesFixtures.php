<?php

namespace App\DataFixtures;

use App\Entity\Categories;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategoriesFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $category = new Categories();
        $category->setTitle('Soupe à l’oignon');
        $category->setDescription('Soupe à l’oignon, crouton aillés, gratiné de parmesan');
        $category->setPrice(16);
        $manager->persist($category);

        $category = new Categories();
        $category->setTitle('Matouille de Savoie');
        $category->setDescription('Matouille de Savoie, fondu de poireau, carottes glacées');
        $category->setPrice(24);
        $manager->persist($category); 

        $manager->flush();
    }
}
