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

        for ($i=0 ; $i < 3 ; $i++) {
            $user = new Users();
            $user->setEmail($faker->email())
            ->setLastname($faker->lastname())
            ->setFirstname($faker->firstname())
            ->setAddress($faker->streetAddress())
            ->setZipcode(str_replace(' ', '', $faker->postcode)) //l'espace dans le Zipcode sera remplacé par rien pour concerver 5 caractères
            ->setCity($faker->city());
            
            $password = $this->encoder->encodePassword($user, 'password');
            $user->setPassword($password);
            
            $manager->persist($user);
        }
        $admin = new Users();
        $admin->setEmail('admin@mail.fr')
              ->setLastname('Dumilly')
              ->setFirstname('Alfred')
              ->setAddress('124 Rue de la République')
              ->setZipcode('73000')
              ->setCity('Chambéry');

              $password = $this->encoder->encodePassword($admin, 'password');
              $admin->setPassword($password)

              ->setRoles(['ROLE_ADMIN']);

              $manager->persist($admin);

        $manager->flush();
    }
    
}

?>