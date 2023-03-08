<?php

namespace App\DataFixtures;

use App\Entity\Menu;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class MenuFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $menu = new Menu();
        $menu->setTitle('Dégustation Alpine');
        $menu->setDescription('Soupe à l’oignon, crouton aillés, gratiné de parmesan');
        $menu->setPrice(38);
        $category = $this->getReference('menu-entrees_1');
        $menu->setCategorie($category);
        $manager->persist($menu);

        $menu = new Menu();
        $menu->setTitle('');
        $menu->setDescription('Méli-mélo de charcuterie du pays, pain bûcheron, bouquet de mâche');
        $menu->setPrice(38);
        $category = $this->getReference('menu-entrees_2');
        $menu->setCategorie($category);
        $manager->persist($menu);

        $manager->flush();
    }
}
