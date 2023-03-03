<?php

namespace App\Form;

use App\Entity\Reservations;
use App\Entity\Users;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
// use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class ReservationsFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, ['attr' => ['class' => 'form-control mb-3 form-title_style'], 'label' => 'Nom de la réservation'])
            ->add('numberGuests', IntegerType::class, ['attr' => ['class' => 'form-control form-title_style mb-3'], 'label' => 'Nombre de convive(s)'])
            ->add('date', DateType::class, ['attr' => ['class' => 'form-control mb-3 form-title_style'], 'label' => 'Choisir une date'])
            ->add('hours', TimeType::class, ['attr' => ['class' => 'form-control mb-3 form-title_style'], 'label' => 'Choisir une heure'])
            ->add('allergies', TextType::class, ['attr' => ['class' => 'form-control mb-3 form-title_style'], 'label' => 'Mentionnez vos allergies'])
            // ->add('users')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Reservations::class,
        ]);
    }
}
