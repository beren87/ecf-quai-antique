<?php

namespace App\DataFixtures;

use App\Entity\Reservations;
use App\Entity\Users; 
use Doctrine\Bundle\FixturesBundle\Fixture; 
use Doctrine\Persistence\ObjectManager;
use Faker\Factory as FakerFactory;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;


class UsersFixtures extends Fixture  
{
    private $encoder;

    Public function __construct(UserPasswordHasherInterface $encoder)
    {
        $this->encoder = $encoder;
        
    }

    public function load(ObjectManager $manager): void
    {
        
        $admin = new Users(); 
        $admin->setEmail('admin@mail.fr')
            ->setLastname('Dumilly')
            ->setFirstname('Alfred')
            ->setAddress('124 Rue de la République')
            ->setZipcode('73000')
            ->setCity('Chambéry')
            ->setNbGuests(0)
            ->setAllergiesMentioned('aucune');
            $password = $this->encoder->hashPassword($admin, 'password');
            $admin->setPassword($password)
            ->setRoles(['ROLE_ADMIN']);
            $manager->persist($admin);
        
            $faker = FakerFactory::create('fr_FR');
              
            $users = new Users();
            $users->setEmail($faker->email());
            $users->setLastname($faker->lastName());
            $users->setFirstname($faker->firstName());
            $users->setAddress($faker->streetAddress());
            $users->setZipcode(str_replace(' ', '', $faker->postcode()));
            $users->setCity($faker->city());
            $users->setNbGuests($faker->numberBetween(2, 8));
            $users->setAllergiesMentioned($faker->words(5, true));
            $password = $this->encoder->hashPassword($users, 'secret');
            $users->setPassword($password);
            $users->setRoles(['ROLE_USER']);
            $manager->persist($users);
            
            //User éffectue une réservation
            $reservations = new Reservations();
            $reservations->setName($faker->lastname());
            $reservations->setNumberGuests($faker->numberBetween(2, 8));
            $reservations->setDate($faker->datetime('Y_m_d'));
            $reservations->setHours($faker->datetime('H_i_s'));
            $reservations->setAllergies($faker->words(5, true));
            $reservations->setUsers($users);
            $manager->persist($reservations); 

            $manager->flush();
     
        
    }
    
}
