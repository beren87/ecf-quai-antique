<?php

namespace App\DataFixtures;

use App\Entity\CategorieMenus;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategorieMenusFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $categorieMenus = new CategorieMenus();
        $categorieMenus->setName('Dégustation Alpine');
        $manager->persist($categorieMenus);
        $this->addReference('degustation', $categorieMenus);

        $categorieMenus = new CategorieMenus();
        $categorieMenus->setName('Préstige Savoyard');
        $manager->persist($categorieMenus);
        $this->addReference('prestige', $categorieMenus);

        $manager->flush();
    }
    public  function getDependencies(): array
    {
        return [CategorieMenusFixtures::class];
    }
}
