<?php

namespace App\Form;

use App\Entity\Vehicule;
// agence form type
use App\Form\AgenceType;
// agence
use App\Repository\AgenceRepository;
use App\Entity\Agence;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Entity\Campervan;

// access agence


class VehiculeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder


            // Access list Campervans
            ->add('campervan', EntityType::class, [
                'class' => Campervan::class,
                'choice_label' => 'nom',
                // autocomplete
                'autocomplete' => true,
                'expanded' => false,
                'label' => "Choix du modèle",
                'attr' => [
                    'class' => 'form-control',
                ],
            ])
            ->add('immatriculation',
                null,
                [
                    'label' => "Immatriculation",
                    'attr' => [
                        'class' => 'form-control',
                        'placeholder' => 'Immatriculation',
                    ],
                ]


            )
            ->add('DateImmatriculation',
                null,
                [
                    'label' => "Date d'immatriculation",
                    'attr' => [
                        'class' => 'form-control',
                        'placeholder' => 'Date d\'immatriculation',
                    ],
                ]


            )
            ->add('numeroSerie',

                null,
                [
                    'label' => "Numéro de série",
                    'attr' => [
                        'class' => 'form-control',
                        'placeholder' => 'Numéro de série',
                    ],
                ]


            )
            ->add('kilometrage',

                null,
                [
                    'label' => "Kilométrage",
                    'attr' => [
                        'class' => 'form-control',
                        'placeholder' => 'Kilométrage',
                    ],
                ])
            ->add('dateKilometrage',

                null,
                [
                    'label' => "Date du kilométrage",
                    'attr' => [
                        'class' => 'form-control',
                        'placeholder' => 'Date du kilométrage',
                    ],
                ]


            )
            ->add('entreeParc',

                null,
                [
                    'label' => "Entrée dans le parc",
                    'attr' => [
                        'class' => 'form-control',
                        'placeholder' => 'Entrée dans le parc',
                    ],
                ])
            ->add('sortieParc',

                null,
                [
                    'label' => "Sortie du parc",
                    'attr' => [
                        'class' => 'form-control',
                        'placeholder' => 'Sortie du parc',
                    ],
                ]


            )
            ->add('statut',

                null,
                [
                    'label' => "Statut",
                    'attr' => [
                        'class' => 'form-control',
                        'placeholder' => 'Statut',
                    ],
                ]


            )
            // agence choice list
            ->add('agence', EntityType::class, [
                // mapped => false
                'label' => 'Associer une agence au véhicule',
                'mapped' => true,
                // multiple => true
                'multiple' => false,
                'class' => Agence::class,
                // choice label nom et prenom
                // 'choice_label' => 'nom',
                'choice_label' => 'nom',
                // expanded => true
                'expanded' => true,

                "required" => false,
                'attr' => [
                    'class' => 'form-control',
                ],
            ])

        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Vehicule::class,
        ]);
    }
}
