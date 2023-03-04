<?php

namespace App\DataFixtures;

use App\Entity\Dishes;
use App\Entity\Users;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
Use Faker\Factory;

class DishesFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');
        
        for($di = 1; $di <= 5; $di++){
            $dishe = new Dishes();
            $user = new Users();
            $dishe->setTitle($faker->text(5))
                  ->setDescription($faker->text(15))
                  ->setPrice($faker->randomFloat(11, 50));
            $category = $this->getReference('category_'. rand(1, 7));
            $dishe->getCategories($category);
            $user->getRoles(['ROLE_ADMIN']);
            $manager->persist($dishe);
        }

        $manager->flush();
    }

    public  function getDependencies(): array
    {
        return [CategoriesFixtures::class];
    }
}
