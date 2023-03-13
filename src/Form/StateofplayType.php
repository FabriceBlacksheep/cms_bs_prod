<?php

namespace App\Form;

use App\Entity\Stateofplay;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Entity\Vehicule;
use App\Entity\Booking;


class StateofplayType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('vehicule',
        EntityType::class,
        [
            'class' => Vehicule::class,
            // 'choice_label' => 'id',
            'attr' => [
                'class' => 'form-control',
            ],
            'autocomplete' => true,
            // autocomplete true

        ]
    )


    // booking choice
    ->add('booking',
    EntityType::class,
    [
        'class' => Booking::class,
        // 'choice_label' => 'id',
        'attr' => [
            'class' => 'form-control',
        ],
        'autocomplete' => true,
        // autocomplete true

    ]
)





            ->add('entryDate',null,[
                'widget' => 'single_text',
                'attr' => [
                    'class' => 'form-control',
                ],
            ])
            ->add('exitDate',null,[
                'widget' => 'single_text',
                'attr' => [
                    'class' => 'form-control',
                ],
            ])
            ->add('generalState',null,[
                'attr' => [
                    'class' => 'form-control',
                ],
            ])
            ->add('returnState',null,[
                'attr' => [
                    'class' => 'form-control',
                ],
            ])
            ->add('status',null,[
                'attr' => [
                    'class' => 'form-control',
                ],
            ])

        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Stateofplay::class,
        ]);
    }
}
