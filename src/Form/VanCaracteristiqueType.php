<?php

namespace App\Form;

use App\Entity\VanCaracteristique;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use FOS\CKEditorBundle\Form\Type\CKEditorType;

class VanCaracteristiqueType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder

            // add nom
            ->add('nom'
                , null
                , [
                    'label' => 'Nom de la caractéristique',
                    'attr' => [
                        'class' => 'form-control',
                    ],
                ]
            )


            ->add('visuel'
                , FileType::class
                , [
                    'label' => 'Visuel',
                    'mapped' => false,
                    'required' => false,
                    'attr' => [
                        'class' => 'form-control',
                    ],
                ]

            )
            ->add('description'
                , CKEditorType::class
                , [
                    'label' => 'Description',
                    'required' => false,
                    'attr' => [
                        'class' => 'form-control',
                    ],
                ]
            )
            ->add('Engine'
                , CKEditorType::class
                , [
                    'label' => 'Motorisation',
                    'required' => false,
                    'attr' => [
                        'class' => 'form-control',
                    ],
                ]
            )
            ->add('Performances'
                , CKEditorType::class
                , [
                    'label' => 'Performances',
                    'required' => false,
                    'attr' => [
                        'class' => 'form-control',
                    ],
                ]
            )
            ->add('Dimensions'
                , CKEditorType::class
                , [
                    'label' => 'Dimensions',
                    'required' => false,
                    'attr' => [
                        'class' => 'form-control',
                    ],
                ]
            )
            ->add('Layout'
                , CKEditorType::class
                , [
                    'label' => 'Aménagement de série',
                    'required' => false,
                    'attr' => [
                        'class' => 'form-control',
                    ],
                ]
            )
            ->add('Equipment'
                , CKEditorType::class
                , [
                    'label' => 'Équipements',
                    'required' => false,
                    'attr' => [
                        'class' => 'form-control',
                    ],
                ]
            )
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => VanCaracteristique::class,
        ]);
    }
}
