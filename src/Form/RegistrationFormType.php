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
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', EmailType::class, ['attr' => ['class' => 'form-control mb-3'], 'constraints' => [ new NotBlank(['message' => 'Veuillez saisir une adresse email'])], 'label' => false])
            ->add('lastname',TextType::class, ['attr' => ['class' => 'form-control mb-3'], 'label' => false])
            ->add('firstname', TextType::class, ['attr' => ['class' => 'form-control mb-3'], 'label' => false])
            ->add('address', TextType::class, ['attr' => ['class' => 'form-control mb-3'], 'label' => false])
            ->add('zipcode', TextType::class, ['attr' => ['class' => 'form-control mb-3'], 'label' => false])
            ->add('city', TextType::class, ['attr' => ['class' => 'form-control mb-3'], 'label' => false])
            //->add('nbGuests', IntegerType::class, ['attr' => ['min' => 2, 'max' => 8, 'class' => 'form-control container--form-fonts mb-3 text-primary', 'placeholder'=>'exemple: 4'], 'label' => false])
            //->add('allergiesMentioned', TextType::class, ['attr' => ['class' => 'form-control container--form-fonts text-primary', 'placeholder'=>'exemple: fruits de mer'], 'label' => false,])
            ->add('agreeTerms', CheckboxType::class, ['attr' => ['class' => 'form-check-input '],
                'mapped' => false,
                'constraints' => [
                    new IsTrue([
                        'message' => 'Vous n\'avez pas accepté les conditions d\'utilisation',
                    ]),
                ], 'label' => false
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
                        'message' => 'Veuillez entrer un mot de passe',
                    ]),
                    new Length([
                        'min' => 6,
                        'minMessage' => 'Votre mot de passe doit contenir au minimum {{ limit }} caractères',
                        // max length allowed by Symfony for security reasons
                        'max' => 12,
                        'maxMessage' => 'Votre mot de passe doit contenir au maximum {{ limit }} caractères',
                    ]),
                ], 'label' => false,
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
