<?php

namespace App\DataFixtures;

use App\Entity\ImagesHome;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ImagesHomeFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        //home
        $imagesHome = new ImagesHome();
        $imagesHome->setFile('fondu-top-02.png');
        $categorieImages = $this->getReference('home');
            $imagesHome->setCategorieImages($categorieImages);
        $manager->persist($imagesHome);
        
        $imagesHome = new ImagesHome();
        $imagesHome->setFile('restaurant-salle-01.png');
        $categorieImages = $this->getReference('home');
            $imagesHome->setCategorieImages($categorieImages);
        $manager->persist($imagesHome);

        $manager->flush();
    }
}
