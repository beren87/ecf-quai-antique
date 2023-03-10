<?php

namespace App\DataFixtures;

use App\Entity\Images;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ImagesFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        //food
        $images = new Images();
        $images->setTitle('Matouille de Savoie');
        $images->setDescription('Matouille de Savoie, fondu de poireau, carottes glacées');
        $images->setFile('img/Matouille-de-Savoie.png');
        $manager->persist($images);

        $images = new Images();
        $images->setTitle('Poularde parfum pied-de-lion');
        $images->setDescription('Poularde parfum pied-de-lion, sauce aux truffes noires, chanterelles sautées');
        $images->setFile('img/poulet-sauce-onctueuse.png');
        $manager->persist($images);

        $images = new Images();
        $images->setTitle('Omble chevalier');
        $images->setDescription('Omble chevalier, genevoise pinot noir, écrasé de fenouil');
        $images->setFile('img/omble-chevalier-pinot-noir.png');
        $manager->persist($images);

        $images = new Images();
        $images->setTitle('Soupe à l\'oignon');
        $images->setDescription('Soupe à l’oignon, crouton aillés, gratiné de parmesan');
        $images->setFile('img/soupe-oignon-01.png');
        $manager->persist($images);

        $images = new Images();
        $images->setTitle('Crumble vanille-tonka');
        $images->setDescription('Crumble vanille-tonka, gel de citron yuzu');
        $images->setFile('img/desert-vanilla-crumble-01.png');
        $manager->persist($images);

        $images = new Images();
        $images->setTitle('Lingot de foie gras de canard');
        $images->setDescription('Lingot de foie gras de canard et pain d’épices, fine gelée de cerise noire');
        $images->setFile('img/foie-gras-viande-canard-sauce-douce.png');
        $manager->persist($images);

        $images = new Images();
        $images->setTitle('Rouleau de grison');
        $images->setDescription('Rouleau de grison, mousseline de céleri, tomme de Savoie');
        $images->setFile('img/rouleau-de-grison.png');
        $manager->persist($images);

        $images = new Images();
        $images->setTitle('Fondu Roussette de Savoie');
        $images->setDescription('Fondu Roussette de Savoie, pain charpentier, trio de fromages');
        $images->setFile('img/fondu-plan-01.png');
        $manager->persist($images);

        $images = new Images();
        $images->setTitle('Parfum de nos campagnes dans son enclos de verdures');
        $images->setDescription('Emmental de Savoie, Tome des Bauges, Reblochon - Pain aux sésames');
        $images->setFile('img/Parfum-campagnes-verdures.png');
        $manager->persist($images);

        //restaurant-environnements
        $images = new Images();
        $images->setTitle('Réinventer la gastronomie en montagne');
        $images->setDescription('Le Chef Arnaud Michant aime le challenge et ne recule devant rien. 
        Faire du Quai Antique le restaurant gastronomique de Chambéry n’est pas une mince affaire. 
        Le mélange authentique et raffiné est ce qui séduit notre clientèle.');
        $images->setFile('img/chef-cuisinier-02.png');
        $manager->persist($images);

        $images = new Images();
        $images->setTitle('Le souci du détail');
        $images->setDescription('Que ce soit pour des plats de spécialités savoyardes ou bien des desserts, chaque détail compte. 
        La brigade se plie en quatre pour respecter au grain de sel près les promesses que le restaurant met en avant.');
        $images->setFile('img/cuisinier-02.png');
        $manager->persist($images);

        $images = new Images();
        $images->setTitle('Diversité dans vos assiettes');
        $images->setDescription('Le Quai Antique vous propose un voyage depuis l’assiette. 
        Passez de la montagne à la mer, de la mer à la ferme, de la ferme à la ville. Vos papilles seront vous faire revivre des lieux ou des odeurs qui vous feront 
        fermez les yeux en guise de moments savourés.');
        $images->setFile('img/cuisinier-01.png');
        $manager->persist($images);

        $images = new Images();
        $images->setTitle('Une brigade toujours dévouée');
        $images->setDescription('Chaque corps de métiers dans une cuisine à son importance, 
        surtout pour varier les spécialités au Quai Antique. Du second de cuisine aux commis, les tâches et responsabilités dans la cuisine sont maîtrisés. 
        Une équipe soudée et dévouée pour vous raconter des saveurs.');
        $images->setFile('img/cuisinier-03.png');
        $manager->persist($images);

        $images = new Images();
        $images->setTitle('Accompagnez vos plats');
        $images->setDescription('Comment un plat parfait peut-il être servis sans un accompagnement digne de notre établissement. Notre sommelier et notre bartender vous suggèrerons les vins et cocktails les plus adaptés à vos plats.');
        $images->setFile('img/cocktail-fresh.png');
        $manager->persist($images);

        $images = new Images();
        $images->setTitle('Pour vous servir');
        $images->setDescription('La qualité du service et son organisation au sein du Quai Antique 
        seront vous mettre à vos aises. L’écoute et les conseils seront vous satisfaire.');
        $images->setFile('img/services.png');
        $manager->persist($images);

        $images = new Images();
        $images->setTitle('Une viande de qualité exemplaire');
        $images->setDescription('L’élevage bovine de la haut Savoie est un plus pour notre restaurant. 
        Le Chef tient à choisir les produits les mieux traités dans son environnement.');
        $images->setFile('img/herd-cows.png');
        $manager->persist($images);

        $images = new Images();
        $images->setTitle('On se mouille pour vous');
        $images->setDescription('La vie pullule également dans les rivières de haute Savoie. 
        Appréciez les produits d’eau douce en plus des produits de la mer. 
        Une pêche plus contrôlée et respectueuse de la biodiversité.');
        $images->setFile('img/beautiful-lake.png');
        $manager->persist($images);

        $images = new Images();
        $images->setTitle('Du Thonon au tonneau');
        $images->setDescription('Un vin issu des vendanges local est une bénédiction pour nos accompagnements. 
        Les producteurs de vins se réjouissent de nos collaborations. 
        Faire découvrir la qualité de la haute Savoie est un objectif atteint pour nous.');
        $images->setFile('img/vignes-chambery.png');
        $manager->persist($images);

        $manager->flush();
    }
}
