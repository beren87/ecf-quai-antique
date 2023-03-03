<?php

namespace App\DataFixtures;

use App\Entity\Footer;
use App\Entity\Users;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
Use Faker\Factory;

class FooterFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $faker = Factory::create('fr_FR');

        // $footers = new Footer();
        // $users = new Users();
        // $footers->setAddress('adresse')
        //        ->setTelephone($faker->phoneNumber())
        //        ->setMail($faker->email())
        //        ->setInstagram('quaiantique-chambery')
        //        ->setFacebook('quaiantique-chambery')
        //        ->setTwitter('@quaiantiquechambery')
        //        ->setYoutube('quaiantique-chambery')
        //        ->setUsers($this->getUsers(''));

        // $manager->persist($footers);

        // $manager->flush();
    }
}
