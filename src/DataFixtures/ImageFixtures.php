<?php

namespace App\DataFixtures;

use App\Entity\Image;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ImageFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        
         $image = new Image();
         $image->setTitle('fondu')
               ->setDescription('fondu')
               ->setPhoto('fondu-top-02.png');
         $manager->persist($image);
        
         $image = new Image();
         $image->setTitle('salle de restaurant')
               ->setDescription('salle de restaurant')
               ->setPhoto('restaurant-salle-01.png');
         $manager->persist($image);
        
         $image = new Image();
         $image->setTitle('Matouille de Savoie')
               ->setDescription('Matouille de Savoie')
               ->setPhoto('Matouille-de-Savoie.png');
         $manager->persist($image);

         $image = new Image();
         $image->setTitle('Poularde parfum pied-de-lion')
               ->setDescription('Poularde parfum pied-de-lion')
               ->setPhoto('poulet-sauce-onctueuse.png');
         $manager->persist($image);

         $image = new Image();
         $image->setTitle('Omble chevalier')
               ->setDescription('Omble chevalier')
               ->setPhoto('omble-chevalier-pinot-noir.png');
         $manager->persist($image);

         $image = new Image();
         $image->setTitle('Soupe à l\'oignon')
               ->setDescription('Soupe à l\'oignon')
               ->setPhoto('soupe-oignon-01.png');
         $manager->persist($image);

         $image = new Image();
         $image->setTitle('Crumble vanille-tonka')
               ->setDescription('Crumble vanille-tonka')
               ->setPhoto('desert-vanilla-crumble-01.png');
         $manager->persist($image);

         $image = new Image();
         $image->setTitle('Lingot de foie gras de canard')
               ->setDescription('Lingot de foie gras de canard')
               ->setPhoto('foie-gras-viande-canard-sauce-douce.png');
         $manager->persist($image);

         //galeries
         $image = new Image();
         $image->setTitle('Réinventer la gastronomie en montagne')
               ->setDescription('Le Chef Arnaud Michant aime le challenge et ne recule devant rien. 
               Faire du Quai Antique le restaurant gastronomique de Chambéry n’est pas une mince affaire. 
               Le mélange authentique et raffiné est ce qui séduit notre clientèle.')
               ->setPhoto('chef-cuisinier-02.png');
         $manager->persist($image);

         $image = new Image();
         $image->setTitle('Le souci du détail')
               ->setDescription('Que ce soit pour des plats de spécialités savoyardes ou bien des desserts, chaque détail compte. 
               La brigade se plie en quatre pour respecter au grain de sel près les promesses que le restaurant met en avant.')
               ->setPhoto('cuisinier-02.png');
         $manager->persist($image);

         $image = new Image();
         $image->setTitle('Diversité dans vos assiettes')
               ->setDescription('Le Quai Antique vous propose un voyage depuis l’assiette. 
               Passez de la montagne à la mer, de la mer à la ferme, de la ferme à la ville. 
               Vos papilles seront vous faire revivre des lieux ou des odeurs qui vous feront 
               fermez les yeux en guise de moments savourés.')
               ->setPhoto('cuisinier-01.png');
         $manager->persist($image);

         $image = new Image();
         $image->setTitle('La brigade toujours dévouée')
               ->setDescription('Chaque corps de métiers dans une cuisine à son importance, 
               surtout pour varier les spécialités au Quai Antique. 
               Du second de cuisine aux commis, les tâches et responsabilités dans la cuisine sont maîtrisés. 
               Une équipe soudée et dévouée pour vous raconter des saveurs.')
               ->setPhoto('cuisinier-03.png');
         $manager->persist($image);

         $image = new Image();
         $image->setTitle('Accompagnez vos plats')
               ->setDescription('Comment un plat parfait peut-il être servis sans un accompagnement digne de l\'établissement. 
               Notre sommelier et notre bartender vous suggèrerons les vins et cocktails les plus adaptés à vos plats.')
               ->setPhoto('cocktail-fresh.png');
         $manager->persist($image);

         $image = new Image();
         $image->setTitle('Pour vous servir')
               ->setDescription('La qualité du service et son organisation au sein du Quai Antique 
               seront vous mettre à vos aises. L’écoute et les conseils seront vous satisfaire.')
               ->setPhoto('services.png');
         $manager->persist($image);

        $manager->flush();
    }
}
