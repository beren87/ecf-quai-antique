<?php

namespace App\Form;

use App\Entity\Users;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', EmailType::class, ['attr' => ['class' => 'form-control mb-3'], 'label' => 'E-mail'])
            ->add('lastname',TextType::class, ['attr' => ['class' => 'form-control mb-3'], 'label' => 'Nom'])
            ->add('firstname', TextType::class, ['attr' => ['class' => 'form-control mb-3'], 'label' => 'Prénom'])
            ->add('address', TextType::class, ['attr' => ['class' => 'form-control mb-3'], 'label' => 'Adresse'])
            ->add('zipcode', TextType::class, ['attr' => ['class' => 'form-control mb-3'], 'label' => 'Code postal'])
            ->add('city', TextType::class, ['attr' => ['class' => 'form-control mb-3'], 'label' => 'Ville'])
            ->add('agreeTerms', CheckboxType::class, ['attr' => ['class' => 'form-check-input py-2'],
                'mapped' => false,
                'constraints' => [
                    new IsTrue([
                        'message' => 'You should agree to our terms.',
                    ]),
                ], 'label' => 'Accepter les conditions d\'utilisation'
            ])
            ->add('plainPassword', PasswordType::class, [
                // instead of being set onto the object directly,
                // this is read and encoded in the controller
                'mapped' => false,
                'attr' => [
                    'autocomplete' => 'new-password',
                    'class' => 'form-control mb-3'
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Please enter a password',
                    ]),
                    new Length([
                        'min' => 6,
                        'minMessage' => 'Votre mot de passe doit contenir au minimum {{ limit }} caractères',
                        // max length allowed by Symfony for security reasons
                        'max' => 12,
                        'maxMessage' => 'Votre mot de passe doit contenir au maximum {{ limit }} caractères',
                    ]),
                ], 'label' => 'mot de passe',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Users::class,
        ]);
    }
}
