<?php

namespace App\DataFixtures;

use App\Entity\Images;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ImagesFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        //Entrées
        $images = new Images(); 
        $images->setTitle('Soupe à l\'oignon');
        $images->setDescription('Soupe à l’oignon, crouton aillés, gratiné de parmesan');
        $images->setFile('soupe-oignon-01.png');
        $category = $this->getReference('entrées');
            $images->setCategorie($category);
        $manager->persist($images);

        $images = new Images();
        $images->setTitle('Royale d’artichaud');
        $images->setDescription('Royale d’artichaud, chips de vitelotte, vinaigrette du soleil');
        $images->setFile('royal-artichaud.png');
        $category = $this->getReference('entrées');
            $images->setCategorie($category);
        $manager->persist($images);

        $images = new Images();
        $images->setTitle('Rouleau de grison');
        $images->setDescription('Rouleau de grison, mousseline de céleri, tomme de Savoie');
        $images->setFile('rouleau-de-grison.png');
        $category = $this->getReference('entrées');
            $images->setCategorie($category);
        $manager->persist($images);

        $images = new Images();
        $images->setTitle('Lingot de foie gras de canard');
        $images->setDescription('Lingot de foie gras de canard et pain d’épices, fine gelée de cerise noire');
        $images->setFile('foie-gras-viande-canard-sauce-douce.png');
        $category = $this->getReference('entrées');
            $images->setCategorie($category);
        $manager->persist($images);

        //Plats spécialités savoyardes
        $images = new Images();
        $images->setTitle('Tartiflette aux cèpes');
        $images->setDescription('Tartiflette aux cèpes, panier de roquette, nid de pignons de pin');
        $images->setFile('tartiflette-cepes.png');
        $category = $this->getReference('specialite');
            $images->setCategorie($category);
        $manager->persist($images);

        $images = new Images();
        $images->setTitle('Fondu Roussette de Savoie');
        $images->setDescription('Fondu Roussette de Savoie, pain charpentier, trio de fromages');
        $images->setFile('fondu-plan-01.png');
        $category = $this->getReference('specialite');
            $images->setCategorie($category);
        $manager->persist($images);

        $images = new Images();
        $images->setTitle('Raclette aux herbes');
        $images->setDescription('Raclette aux herbes, grenaille en robe des champs, caillasse de Savoie');
        $images->setFile('raclette.png');
        $category = $this->getReference('specialite');
            $images->setCategorie($category);
        $manager->persist($images);

        $images = new Images();
        $images->setTitle('Matouille de Savoie');
        $images->setDescription('Matouille de Savoie, fondu de poireau, carottes glacées');
        $images->setFile('Matouille-de-Savoie.png');
        $category = $this->getReference('specialite');
            $images->setCategorie($category);
        $manager->persist($images);

        //Plats de viande
        $images = new Images();
        $images->setTitle('Diots fumées');
        $images->setDescription('Diots fumées au vin blanc Roussette de Savoie, crème ciboulette');
        $images->setFile('diots-fumees.png');
        $category = $this->getReference('viande');
            $images->setCategorie($category);
        $manager->persist($images);

        $images = new Images();
        $images->setTitle('Poularde parfum pied-de-lion');
        $images->setDescription('Poularde parfum pied-de-lion, sauce aux truffes noires, chanterelles sautées');
        $images->setFile('poulet-sauce-onctueuse.png');
        $category = $this->getReference('viande');
        $images->setCategorie($category);
        $manager->persist($images);

        $images = new Images();
        $images->setTitle('Tournedos');
        $images->setDescription('Tournedos de filet de bœuf, jus au porto rouge');
        $images->setFile('tournedos.png');
        $category = $this->getReference('viande');
        $images->setCategorie($category);
        $manager->persist($images);

        //p-Plats de poisson
        $images = new Images();
        $images->setTitle('Omble chevalier');
        $images->setDescription('Omble chevalier, genevoise pinot noir, écrasé de fenouil');
        $images->setFile('omble-chevalier-pinot-noir.png');
        $category = $this->getReference('poisson');
        $images->setCategorie($category);
        $manager->persist($images);

        $images = new Images();
        $images->setTitle('Lotte sur lit de poireau');
        $images->setDescription('Lotte sur lit de poireau au curry, émulsion de langoustine');
        $images->setFile('lotte.png');
        $category = $this->getReference('poisson');
        $images->setCategorie($category);
        $manager->persist($images);

        $images = new Images();
        $images->setTitle('Suprême de turbot');
        $images->setDescription('Suprême de turbot au jus de légumes et citron vert');
        $images->setFile('turbot.png');
        $category = $this->getReference('poisson');
        $images->setCategorie($category);
        $manager->persist($images);

        //Plateau de fromages
        $images = new Images();
        $images->setTitle('Charette de nos pâturages');
        $images->setDescription('Abondance, Beaufort et Tommette de chèvre - Pain aux figues-noix');
        $images->setFile('charette-paturages.png');
        $category = $this->getReference('fromage');
        $images->setCategorie($category);
        $manager->persist($images);
        
        $images = new Images();
        $images->setTitle('Parfum de nos campagnes dans son enclos de verdures');
        $images->setDescription('Emmental de Savoie, Tome des Bauges, Reblochon - Pain aux sésames');
        $images->setFile('Parfum-campagnes-verdures.png');
        $category = $this->getReference('fromage');
        $images->setCategorie($category);
        $manager->persist($images);

        $images = new Images();
        $images->setTitle('Les offrandes du berger');
        $images->setDescription('Chevrotin, Roulé de chèvre frais, Séchon de chèvre - Pain bûcheron');
        $images->setFile('offrandes-berger.png');
        $category = $this->getReference('fromage');
        $images->setCategorie($category);
        $manager->persist($images);

        
        //Desserts
        $images = new Images();
        $images->setTitle('Mousse au chocolat');
        $images->setDescription('Mousse au chocolat et caramel mou à la fleur de sel');
        $images->setFile('mousse-chocolat.png');
        $category = $this->getReference('dessert');
        $images->setCategorie($category);
        $manager->persist($images);

        $images = new Images();
        $images->setTitle('Sucrissime crème pâtissière');
        $images->setDescription('Sucrissime crème pâtissière, zeste d’orange');
        $images->setFile('sucrissime.png');
        $category = $this->getReference('dessert');
        $images->setCategorie($category);
        $manager->persist($images);

        $images = new Images();
        $images->setTitle('Super moelleux');
        $images->setDescription('Super moelleux de biscuit de Savoie');
        $images->setFile('super-moelleux.png');
        $category = $this->getReference('dessert');
        $images->setCategorie($category);
        $manager->persist($images);

        $images = new Images();
        $images->setTitle('Crumble vanille-tonka');
        $images->setDescription('Crumble vanille-tonka, gel de citron yuzu');
        $images->setFile('desert-vanilla-crumble-01.png');
        $category = $this->getReference('dessert');
        $images->setCategorie($category);
        $manager->persist($images);
        
        $manager->flush();
    }
}
