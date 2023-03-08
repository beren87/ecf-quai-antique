<?php

namespace App\DataFixtures;

use App\Entity\Menu;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class MenuFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        //Dégustation Alpine
        $menu = new Menu();
        $menu->setTitle('Entrées');
        $menu->setDescription('Soupe à l’oignon, crouton aillés, gratiné de parmesan');
        $menu->setNextDescription('Méli-mélo de charcuterie du pays, pain bûcheron, bouquet de mâche');
        $menu->setPrice(38);
        $category = $this->getReference('degustation');
        $menu->setCategorie($category);
        $manager->persist($menu);

        $menu = new Menu();
        $menu->setTitle('Plats');
        $menu->setDescription('Fondu Roussette de Savoie, pain charpentier, trio de fromages');
        $menu->setNextDescription('Diots fumées au vin blanc Roussette de Savoie, crème ciboulette');
        $menu->setPrice(38);
        $category = $this->getReference('degustation');
        $menu->setCategorie($category);
        $manager->persist($menu);

        $menu = new Menu();
        $menu->setTitle('Desserts');
        $menu->setDescription('Sucrissime crème pâtissière, zeste d’orange');
        $menu->setNextDescription('Mousse au chocolat et caramel mou à la fleur de sel');
        $menu->setPrice(38);
        $category = $this->getReference('degustation');
        $menu->setCategorie($category);
        $manager->persist($menu);

        $menu = new Menu();
        $menu->setTitle('Charette de nos pâturages');
        $menu->setDescription('Abondance, Beaufort et Tommette de chèvre');
        $menu->setNextDescription('');
        $menu->setPrice(38);
        $category = $this->getReference('degustation');
        $menu->setCategorie($category);
        $manager->persist($menu);

        //Préstige Savoyard 
        $menu = new Menu();
        $menu->setTitle('Entrées');
        $menu->setDescription('Lingot de foie gras de canard et pain d’épices, fine gelée de cerise noire');
        $menu->setNextDescription('Craquant de gambas, sauce aigre-douce');
        $menu->setPrice(65);
        $category = $this->getReference('prestige');
        $menu->setCategorie($category);
        $manager->persist($menu);

        $menu = new Menu();
        $menu->setTitle('Plats');
        $menu->setDescription('Omble chevalier, genevoise pinot noir, écrasé de fenouil');
        $menu->setNextDescription('Matouille de Savoie, fondu de poireau, carottes glacées');
        $menu->setPrice(65);
        $category = $this->getReference('prestige');
        $menu->setCategorie($category);
        $manager->persist($menu);

        $menu = new Menu();
        $menu->setTitle('Desserts');
        $menu->setDescription('Super moelleux de biscuit de Savoie');
        $menu->setNextDescription('Tarte tatin, boule glace rhum-raisin, amandes effilées');
        $menu->setPrice(65);
        $category = $this->getReference('prestige');
        $menu->setCategorie($category);
        $manager->persist($menu);

        $menu = new Menu();
        $menu->setTitle('Parfum de nos campagnes dans son enclos de verdure');
        $menu->setDescription('Emmental de Savoie, Tome des Bauges, Reblochon');
        $menu->setNextDescription('Emmental de Savoie, Tome des Bauges, Reblochon');
        $menu->setPrice(65);
        $category = $this->getReference('prestige');
        $menu->setCategorie($category);
        $manager->persist($menu);


        $manager->flush();
    }
}
