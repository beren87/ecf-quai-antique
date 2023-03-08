<?php

namespace App\DataFixtures;

use App\Entity\Categorie;
use Doctrine\Bundle\FixturesBundle\Fixture; 
use Doctrine\Persistence\ObjectManager;

class CategoriesFixtures extends Fixture 
{
    
    public function load(ObjectManager $manager): void
    {
        
        $category = new Categorie();
        $category->setName('Entrées');
        $manager->persist($category);
        $this->addReference('entrées', $category);
        
        
        $category = new Categorie();
        $category->setName('Plats spécialités savoyardes');
        $manager->persist($category);
        $this->addReference('specialite', $category);

        $category = new Categorie();
        $category->setName('Plats de viande');
        $manager->persist($category);
        $this->addReference('viande', $category);

        $category = new Categorie();
        $category->setName('Plats de poisson');
        $manager->persist($category);
        $this->addReference('poisson', $category);

        $category = new Categorie();
        $category->setName('Plateau de fromages et pains');
        $manager->persist($category);
        $this->addReference('fromage', $category);

        $category = new Categorie();
        $category->setName('Pains');
        $manager->persist($category);
        $this->addReference('pain', $category);

        $category = new Categorie();
        $category->setName('Desserts');
        $manager->persist($category);
        $this->addReference('dessert', $category);
         
        $manager->flush();
    }
}
?>