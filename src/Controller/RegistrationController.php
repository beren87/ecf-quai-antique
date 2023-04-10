<?php

namespace App\Controller;

use App\Entity\Users;
use App\Form\RegistrationFormType;
use App\Repository\OpeningHourRepository;
use App\Repository\RestaurantRepository;
use App\Security\UsersAuthenticator;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\UserAuthenticatorInterface;

class RegistrationController extends AbstractController
{
    private $manager;
    public function __construct(EntityManagerInterface $manager)
    {
        $this->manager = $manager;
    }

    #[Route('/inscription', name: 'app_register')]
    public function register(Request $request, 
    UserPasswordHasherInterface $userPasswordHasher, 
    UserAuthenticatorInterface $userAuthenticator, 
    UsersAuthenticator $authenticator, 
    EntityManagerInterface $entityManager, 
    RestaurantRepository $restaurantRepository, 
    OpeningHourRepository $openingHourRepository): Response
    {
        

        $user = new Users();
        $form = $this->createForm(RegistrationFormType::class, $user);
        $form->handleRequest($request);
 
        if ($form->isSubmitted() && $form->isValid()) {
            //récupère les données pour le nombre d'invités
            $nbGuests = $form->get('nbGuests')->getData();
            $allergiesMentioned = $form->get('allergiesMentioned')->getData();

            // si l'utilisateur est connecté, mettre à jour ses informations
            if ($user) {
                $user->setNbGuests($nbGuests);
                $user->setAllergiesMentioned($allergiesMentioned);
                $this->manager->flush();
            }
            
            // Récupération des données du formulaire
            $user=$form->getData();
            // encode the plain password
            $user->setPassword(
                $userPasswordHasher->hashPassword(
                    $user,
                    $form->get('plainPassword')->getData()
                )
            );

            $entityManager->persist($user); 
            $entityManager->flush();
            // do anything else you need here, like send an email

            return $userAuthenticator->authenticateUser(
                $user,
                $authenticator,
                $request
            );
        }

        return $this->render('registration/register.html.twig', [
            'registrationForm' => $form->createView(),
            'restaurants' => $restaurantRepository->findBy([]),
            'openinghours' => $openingHourRepository->findBy([])
        ]);
    }
}
