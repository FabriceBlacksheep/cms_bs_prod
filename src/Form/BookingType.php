<?php

namespace App\Form;

use App\Entity\Booking;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
// agence entity
use App\Entity\Agence;
// vehicule entity
use App\Entity\Vehicule;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
// user entity
use App\Entity\User;
// user form
use App\Form\UserType;



class BookingType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder


        // user choice list
        ->add('user', EntityType::class, [
            'class' => User::class,
            'choice_label' => 'identite',
            'expanded' => false,
            'label' => "Choix du client",
            'attr' => [
                'class' => 'form-control',
            ],
        ])



        // agence choice list
            ->add('agence', EntityType::class, [
                'class' => Agence::class,
                'choice_label' => 'nom',
                'expanded' => false,
                'label' => "Agence de départ",

                'attr' => [
                    'class' => 'form-control',

                ],
            ])

            // vehicule choice list
            ->add('vehicule', EntityType::class, [
                'class' => Vehicule::class,
                // 'choice_label' => 'modele et immatriculation',
                // 'choice_label' => 'immatriculation',
                // default return to string
                'expanded' => false,
                'label' => "Choix du véhicule",
                'attr' => [
                    'class' => 'form-control',
                ],

            ])







            ->add('DateBegin',
                null,
                [
                    'widget' => 'single_text',
                    'label' => "Date de départ",
                    'attr' => [
                        'class' => 'form-control',
                    ],
                ])
            ->add('DateEnd',
                null,
                [
                    'widget' => 'single_text',
                    'label' => "Date de retour",
                    'attr' => [
                        'class' => 'form-control',
                    ],
                ])
            ->add('Price',null,[
                'label' => "Montant de la réservation",
                'attr' => [
                    'class' => 'form-control',
                ],
            ])
        ;

    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Booking::class,

        ]);
    }
}
