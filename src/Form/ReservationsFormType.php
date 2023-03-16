<?php

namespace App\Form;

use App\Entity\Reservations;
use App\Entity\Users;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
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
        //réservation pour un utilisateur non connecté
        $builder
            //->add('name', EntityType::class, ['class' => Users::class, 'query_builder' => function (EntityRepository $er){return $er->createQueryBuilder('u')->orderBy('u.lastname', 'ASC');}, 'choice_label' => 'lastname', 'attr' => ['class' => 'form-control mb-3 form-title_style text-primary', 'placeholder'=>'exemple: Dupont'], 'label' => false])
            //->add('allergies', EntityType::class, ['class' => Users::class, 'query_builder' => function (EntityRepository $er) {return $er->createQueryBuilder('u')->orderBy('u.allergiesMentioned', 'ASC');}, 'choice_label' => 'allergiesMentioned', 'attr' => ['class' => 'form-control form-title_style mb-3 text-primary'], 'label' => false])
            //->add('numberGuests', EntityType::class, ['class' => Users::class, 'query_builder' => function (EntityRepository $er) {return $er->createQueryBuilder('u')->orderBy('u.nbGuests', 'ASC');}, 'choice_label' => 'nbGuests', 'attr' => ['min' => 2, 'max' => 8, 'class' => 'form-control form-title_style mb-3 text-primary'], 'label' => false])
            ->add('name', TextType::class, ['attr' => ['class' => 'form-control mb-3 form-title_style text-primary'], 'label' => false])
            ->add('numberGuests', IntegerType::class, ['attr' => ['min' => 2, 'max' => 8, 'class' => 'form-control form-title_style mb-3 text-primary'], 'label' => false])
            ->add('date', DateType::class, ['attr' => ['class' => 'form-control mb-3 form-title_style text-primary'], 'label' => false, 'widget'=>'single_text', 'model_timezone' => 'Europe/Paris'])
            ->add('hours', TimeType::class, ['attr' => ['class' => 'form-control mb-3 form-title_style text-primary'], 
            'label' => false, 
            'widget'=>'choice', 
            'placeholder'=>['hour'=>'Heure', 'minute'=>'Minute'],
            'hours'=>[12, 13, 19 , 20, 21],
            'minutes'=>[00, 15, 30, 45]
    ])
            ->add('allergies', TextType::class, ['attr' => ['class' => 'form-control form-title_style text-primary', 'placeholder'=>'exemple: fruits de mer'], 'label' => false,]);       
        }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Reservations::class,
        ]);
    }

   
}
