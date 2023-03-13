<?php

namespace App\Form;

use App\Entity\Reservations;
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
            ->add('name', TextType::class, ['attr' => ['class' => 'form-control mb-3 form-title_style text-primary', 'placeholder'=>'exemple: Dupont'], 'label' => false])
            ->add('numberGuests', IntegerType::class, ['attr' => ['class' => 'form-control form-title_style mb-3 text-primary', 'placeholder'=>'exemple: 4'], 'label' => false])
            ->add('date', DateType::class, ['attr' => ['class' => 'form-control mb-3 form-title_style text-primary'], 'label' => false, 'widget'=>'single_text'])
            ->add('hours', TimeType::class, ['attr' => ['class' => 'form-control mb-3 form-title_style text-primary'], 
            'label' => false, 
            'widget'=>'choice', 
            'placeholder'=>['hour'=>'Heure', 'minute'=>'Minute'],
            'hours'=>[12, 13, 19 , 20, 21],
            'minutes'=>[00, 15, 30, 45]
            ])
            ->add('allergies', TextType::class, ['attr' => ['class' => 'form-control form-title_style text-primary', 'placeholder'=>'exemple: fruits de mer'], 
            'label' => false,]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Reservations::class,
        ]);
    }
}
