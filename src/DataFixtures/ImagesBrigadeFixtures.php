<?php

namespace App\DataFixtures;

use App\Entity\ImagesBrigade;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ImagesBrigadeFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        //brigade
        $imagesBrigade = new ImagesBrigade();
        $imagesBrigade->setTitle('Stéphane Montier');
        $imagesBrigade->setDescription('Le second de cuisine');
        $imagesBrigade->setFile('Stephane-montier.png');
        $categorieImages = $this->getReference('brigade');
            $imagesBrigade->setCategorieImages($categorieImages);
        $manager->persist($imagesBrigade);
        
        $imagesBrigade = new ImagesBrigade();
        $imagesBrigade->setTitle('Ahcène Flétan');
        $imagesBrigade->setDescription('Le Chef de partie poissonnier');
        $imagesBrigade->setFile('Ahcene-fletan.png');
        $categorieImages = $this->getReference('brigade');
            $imagesBrigade->setCategorieImages($categorieImages);
        $manager->persist($imagesBrigade);
        
        $imagesBrigade = new ImagesBrigade();
        $imagesBrigade->setTitle('Pavlo Savëenko');
        $imagesBrigade->setDescription('Le Chef de partie spécialisé pain et fromage');
        $imagesBrigade->setFile('pavlo-Savëenko.png');
        $categorieImages = $this->getReference('brigade');
            $imagesBrigade->setCategorieImages($categorieImages);
        $manager->persist($imagesBrigade);
        
        $imagesBrigade = new ImagesBrigade();
        $imagesBrigade->setTitle('Mathis Breux');
        $imagesBrigade->setDescription('Le Chef pâtissier');
        $imagesBrigade->setFile('Mathis-breux.png');
        $categorieImages = $this->getReference('brigade');
            $imagesBrigade->setCategorieImages($categorieImages);
        $manager->persist($imagesBrigade);
        
        $imagesBrigade = new ImagesBrigade();
        $imagesBrigade->setTitle('Adélaïde Sena');
        $imagesBrigade->setDescription('La grillardine');
        $imagesBrigade->setFile('Adelaide-sena.png');
        $categorieImages = $this->getReference('brigade');
            $imagesBrigade->setCategorieImages($categorieImages);
        $manager->persist($imagesBrigade);
        
        $imagesBrigade = new ImagesBrigade();
        $imagesBrigade->setTitle('Angélique Darenne');
        $imagesBrigade->setDescription('La directrice du restaurant');
        $imagesBrigade->setFile('Angelique-darenne.png');
        $categorieImages = $this->getReference('brigade');
            $imagesBrigade->setCategorieImages($categorieImages);
        $manager->persist($imagesBrigade);
        
        $imagesBrigade = new ImagesBrigade();
        $imagesBrigade->setTitle('Alfred Dumilly');
        $imagesBrigade->setDescription('Le maître d\'hotel');
        $imagesBrigade->setFile('Alfred-Dumilly.png');
        $categorieImages = $this->getReference('brigade');
            $imagesBrigade->setCategorieImages($categorieImages);
        $manager->persist($imagesBrigade);
        
        $imagesBrigade = new ImagesBrigade();
        $imagesBrigade->setTitle('Augusto Hernandez');
        $imagesBrigade->setDescription('Le Chef de rang');
        $imagesBrigade->setFile('Augusto-hernandez.png');
        $categorieImages = $this->getReference('brigade');
            $imagesBrigade->setCategorieImages($categorieImages);
        $manager->persist($imagesBrigade);
        
        $imagesBrigade = new ImagesBrigade();
        $imagesBrigade->setTitle('Alexandre Chameliard');
        $imagesBrigade->setDescription('Le sommelier');
        $imagesBrigade->setFile('Alexandre-chameliard-sommelier.png');
        $categorieImages = $this->getReference('brigade');
            $imagesBrigade->setCategorieImages($categorieImages);
        $manager->persist($imagesBrigade);
        
        $imagesBrigade = new ImagesBrigade();
        $imagesBrigade->setTitle('Michaël Mongeot');
        $imagesBrigade->setDescription('Le Bartender');
        $imagesBrigade->setFile('Michael-Mongeot.png');
        $categorieImages = $this->getReference('brigade');
            $imagesBrigade->setCategorieImages($categorieImages);
        $manager->persist($imagesBrigade);

        $manager->flush();
    }
}
