<?php

namespace App\DataFixtures;

use App\Entity\Users; 
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
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
              ->setCity('Chambéry');

              $password = $this->encoder->hashPassword($admin, 'password');
              $admin->setPassword($password)

              ->setRoles(['ROLE_ADMIN']);

              $manager->persist($admin);

        $manager->flush();
     
        
    }
    
}
