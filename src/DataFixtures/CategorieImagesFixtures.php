<?php

namespace App\DataFixtures;

use App\Entity\CategorieImages;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategorieImagesFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $categorieImages = new CategorieImages();
        $categorieImages->setName('Les plats incontournable');
        $manager->persist($categorieImages);
        $this->addReference('incontournable', $categorieImages);

        $categorieImages = new CategorieImages();
        $categorieImages->setName('Home');
        $manager->persist($categorieImages);
        $this->addReference('home', $categorieImages);

        $categorieImages = new CategorieImages();
        $categorieImages->setName('La brigade');
        $manager->persist($categorieImages);
        $this->addReference('brigade', $categorieImages);

        $categorieImages = new CategorieImages();
        $categorieImages->setName('le restaurant');
        $manager->persist($categorieImages);
        $this->addReference('environnement', $categorieImages);

        $categorieImages = new CategorieImages();
        $categorieImages->setName('Produits locaux');
        $manager->persist($categorieImages);
        $this->addReference('locaux', $categorieImages);

        $manager->flush();
    }
    public  function getDependencies(): array
    {
        return [CategorieMenusFixtures::class];
    }
}
