<?php

namespace App\DataFixtures;

use App\Entity\Dishe;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class DishesFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
            //entrées
            $dishe = new Dishe();
            $dishe->setTitle('Soupe à l’oignon');
            $dishe->setDescription('Soupe à l’oignon, crouton aillés, gratiné de parmesan');
            $dishe->setPrice(16);
            $category = $this->getReference('entrées');
            $dishe->setCategory($category);
            $manager->persist($dishe);

            $dishe = new Dishe();
            $dishe->setTitle('Royale d’artichaud');
            $dishe->setDescription('Royale d’artichaud, chips de vitelotte, vinaigrette du soleil');
            $dishe->setPrice(18);
            $category = $this->getReference('entrées');
            $dishe->setCategory($category);
            $manager->persist($dishe);

            $dishe = new Dishe();
            $dishe->setTitle('Rouleau de grison');
            $dishe->setDescription('Rouleau de grison, mousseline de céleri, tomme de Savoie');
            $dishe->setPrice(21);
            $category = $this->getReference('entrées');
            $dishe->setCategory($category);
            $manager->persist($dishe);

            $dishe = new Dishe();
            $dishe->setTitle('Lingot de foie');
            $dishe->setDescription('Lingot de foie gras de canard et pain d’épices, fine gelée de cerise noire');
            $dishe->setPrice(22);
            $category = $this->getReference('entrées');
            $dishe->setCategory($category);
            $manager->persist($dishe);

            //Plats specialites savoyards
            $dishe = new Dishe();
            $dishe->setTitle('Tartiflette aux cèpes');
            $dishe->setDescription('Tartiflette aux cèpes, panier de roquette, nid de pignons de pin');
            $dishe->setPrice(24);
            $category = $this->getReference('specialite');
            $dishe->setCategory($category);
            $manager->persist($dishe);

            $dishe = new Dishe();
            $dishe->setTitle('Fondu Roussette de Savoie');
            $dishe->setDescription('Fondu Roussette de Savoie, pain charpentier, trio de fromages');
            $dishe->setPrice(24);
            $category = $this->getReference('specialite');
            $dishe->setCategory($category);
            $manager->persist($dishe);

            $dishe = new Dishe();
            $dishe->setTitle('Raclette aux herbes');
            $dishe->setDescription('Raclette aux herbes, grenaille en robe des champs, caillasse de Savoie');
            $dishe->setPrice(24);
            $category = $this->getReference('specialite');
            $dishe->setCategory($category);
            $manager->persist($dishe);

            $dishe = new Dishe();
            $dishe->setTitle('Matouille de Savoie');
            $dishe->setDescription('Matouille de Savoie, fondu de poireau, carottes glacées');
            $dishe->setPrice(24);
            $category = $this->getReference('specialite');
            $dishe->setCategory($category);
            $manager->persist($dishe);

            //Plats de viande
            $dishe = new Dishe();
            $dishe->setTitle('Diots fumées');
            $dishe->setDescription('Diots fumées au vin blanc Roussette de Savoie, crème ciboulette');
            $dishe->setPrice(26);
            $category = $this->getReference('viande');
            $dishe->setCategory($category);
            $manager->persist($dishe);

            $dishe = new Dishe();
            $dishe->setTitle('Poularde parfum pied-de-lion');
            $dishe->setDescription('Poularde parfum pied-de-lion, sauce aux truffes noires, chanterelles sautées');
            $dishe->setPrice(28);
            $category = $this->getReference('viande');
            $dishe->setCategory($category);
            $manager->persist($dishe);

            $dishe = new Dishe();
            $dishe->setTitle('Tournedos');
            $dishe->setDescription('Tournedos de filet de bœuf, jus au porto rouge');
            $dishe->setPrice(30);
            $category = $this->getReference('viande');
            $dishe->setCategory($category);
            $manager->persist($dishe);

            //Plats de poisson
            $dishe = new Dishe();
            $dishe->setTitle('Omble chevalier');
            $dishe->setDescription('Omble chevalier, genevoise pinot noir, écrasé de fenouil');
            $dishe->setPrice(31);
            $category = $this->getReference('poisson');
            $dishe->setCategory($category);
            $manager->persist($dishe);

            $dishe = new Dishe();
            $dishe->setTitle('Lotte sur lit de poireau');
            $dishe->setDescription('Lotte sur lit de poireau au curry, émulsion de langoustine');
            $dishe->setPrice(34);
            $category = $this->getReference('poisson');
            $dishe->setCategory($category);
            $manager->persist($dishe);

            $dishe = new Dishe();
            $dishe->setTitle('Suprême de turbot');
            $dishe->setDescription('Suprême de turbot au jus de légumes et citron vert');
            $dishe->setPrice(37);
            $category = $this->getReference('poisson');
            $dishe->setCategory($category);
            $manager->persist($dishe);

            //plateau de fromages 
            $dishe = new Dishe();
            $dishe->setTitle('Charette de nos pâturages');
            $dishe->setDescription('Abondance, Beaufort et Tommette de chèvre');
            $dishe->setPrice(15);
            $category = $this->getReference('fromage');
            $dishe->setCategory($category);
            $manager->persist($dishe);

            $dishe = new Dishe();
            $dishe->setTitle('Parfum de nos campagnes dans son enclos de verdures');
            $dishe->setDescription('Emmental de Savoie, Tome des Bauges, Reblochon');
            $dishe->setPrice(15);
            $category = $this->getReference('fromage');
            $dishe->setCategory($category);
            $manager->persist($dishe);

            $dishe = new Dishe();
            $dishe->setTitle('Les offrandes du berger');
            $dishe->setDescription('Chevrotin, Roulé de chèvre frais, Séchon de chèvre');
            $dishe->setPrice(15);
            $category = $this->getReference('fromage');
            $dishe->setCategory($category);
            $manager->persist($dishe);

            //pains
            $dishe = new Dishe();
            $dishe->setTitle('');
            $dishe->setDescription('Pain aux figues-noix');
            $dishe->setPrice(0);
            $category = $this->getReference('pain');
            $dishe->setCategory($category);
            $manager->persist($dishe);

            $dishe = new Dishe();
            $dishe->setTitle('');
            $dishe->setDescription('Pain aux sésames');
            $dishe->setPrice(0);
            $category = $this->getReference('pain');
            $dishe->setCategory($category);
            $manager->persist($dishe);

            $dishe = new Dishe();
            $dishe->setTitle('');
            $dishe->setDescription('Pain bûcheron');
            $dishe->setPrice(0);
            $category = $this->getReference('pain');
            $dishe->setCategory($category);
            $manager->persist($dishe);

            $dishe = new Dishe();
            $dishe->setTitle('');
            $dishe->setDescription('Pain seigle des montagnes');
            $dishe->setPrice(0);
            $category = $this->getReference('pain');
            $dishe->setCategory($category);
            $manager->persist($dishe);

            //desserts
            $dishe = new Dishe();
            $dishe->setTitle('Mousse au chocolat');
            $dishe->setDescription('Mousse au chocolat et caramel mou à la fleur de sel');
            $dishe->setPrice(11);
            $category = $this->getReference('dessert');
            $dishe->setCategory($category);
            $manager->persist($dishe);

            $dishe = new Dishe();
            $dishe->setTitle('Sucrissime crème pâtissière');
            $dishe->setDescription('Sucrissime crème pâtissière, zeste d’orange');
            $dishe->setPrice(12);
            $category = $this->getReference('dessert');
            $dishe->setCategory($category);
            $manager->persist($dishe);

            $dishe = new Dishe();
            $dishe->setTitle('Super moelleux');
            $dishe->setDescription('Super moelleux de biscuit de Savoie');
            $dishe->setPrice(13);
            $category = $this->getReference('dessert');
            $dishe->setCategory($category);
            $manager->persist($dishe);

            $dishe = new Dishe();
            $dishe->setTitle('Crumble vanille-tonka');
            $dishe->setDescription('Crumble vanille-tonka, gel de citron yuzu');
            $dishe->setPrice(14);
            $category = $this->getReference('dessert');
            $dishe->setCategory($category);
            $manager->persist($dishe);

        $manager->flush();
    }

    public  function getDependencies(): array
    {
        return [CategoriesFixtures::class];
    }
}
