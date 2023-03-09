<?php

namespace App\DataFixtures;

use App\Entity\Menus;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class MenusFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        //Menus
        $menus = new Menus();
        $menus->setTitle('Formule du midi');
        $menus->setDescription('Plat + Dessert');
        $menus->setPrice(38);
        $categorieMenus = $this->getReference('degustation');
        $menus->setCategorieMenus($categorieMenus);
        $manager->persist($menus);

        $menus = new Menus();
        $menus->setTitle('Formule du soir');
        $menus->setDescription('Entrée + Plat + Dessert');
        $menus->setPrice(65);
        $categorieMenus = $this->getReference('prestige');
        $menus->setCategorieMenus($categorieMenus);
        $manager->persist($menus);

        $manager->flush();
    }
    public  function getDependencies(): array
    {
        return [CategoriesFixtures::class];
    }
}
