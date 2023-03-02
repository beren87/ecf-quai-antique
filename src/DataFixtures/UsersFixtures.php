<?php

namespace App\DataFixtures;

use App\Entity\Users;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
Use Faker\Factory;
Use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UsersFixtures extends Fixture
{
    private $encoder;

    Public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');
        for ($i=0 ; $i < 10 ; $i++) {
            $user = new Users();
            $user->setEmail($faker->email())
            ->setLastname($faker->lastname())
            ->setFirstname($faker->firstname())
            ->setAddress($faker->streetAddress())
            ->setZipcode($faker->departmentNumber())
            ->setCity($faker->city());
            
            $password = $this->encoder->encodePassword($user, 'password');
            $user->setPassword($password);
            
            $manager->persist($user);
        }

        $manager->flush();
    }
}
