<?php

namespace App\DataFixtures;

use App\Entity\Categorie;
use Doctrine\Bundle\FixturesBundle\Fixture; 
use Doctrine\Persistence\ObjectManager;
Use Faker\Factory;

class CategoriesFixtures extends Fixture 
{
    private $counter = 1;
    
    public function load(ObjectManager $manager): void
    {
        
        $category = new Categorie();
        $category->setName('Entrées');
        $this->addReference('category_'.$this->counter, $category);
            $this->counter++;
        
        $manager->persist($category);
        
        $category = new Categorie();
        $category->setName('Plats spécialités savoyardes');
        $manager->persist($category);
        $this->addReference('category_'.$this->counter, $category);
            $this->counter++;
        
        $faker = Factory::create('fr_FR');
        
        for($cat = 3; $cat <=7; $cat++){
            $category = new Categorie();
            $category->setName($faker->text(6));
            
            $manager->persist($category);
            $this->addReference('category_'.$this->counter, $category);
            $this->counter++;
        }
        
        
        
        $manager->flush();
    }
}
?>