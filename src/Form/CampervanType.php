<?php

namespace App\Form;

use App\Entity\Campervan;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\UX\Dropzone\Form\DropzoneType;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
// FileType
use Symfony\Component\Form\Extension\Core\Type\FileType;

class CampervanType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom',null,[
                'attr' => [
                    'class' => 'form-control',
                ],
            ])
            // idLocpro is a foreign key
            ->add('idLocpro',null,[
                'attr' => [
                    'class' => 'form-control',
                ],
            ])
            ->add('modele',null,[
                'attr' => [
                    'class' => 'form-control',
                ],
            ])
            ->add('description',CKEditorType::class)
            ->add('description_EN',CKEditorType::class
            , [
                'label' => 'Déscription ANGLAISE',
                'attr' => [
                    'class' => 'form-control',
                ],
            ]
            )
            ->add('description_DE',CKEditorType::class, [
                'label' => 'Déscription ALLEMANDE',
                'attr' => [
                    'class' => 'form-control',
                ],
            ]
            )
            ->add('description_NL',CKEditorType::class, [
                'label' => 'Déscription NÉERLANDAISE',
                'attr' => [
                    'class' => 'form-control',
                ],
            ]
            )
            ->add('options',null,[
                'attr' => [
                    'class' => 'form-control',
                ],
            ])
            ->add('visiteVirtuelle',null,[
                'attr' => [
                    'class' => 'form-control',
                ],
            ])
            // visuel file

                        // add visuel FileType
                        ->add('visuel', FileType::class, [
                            'data_class' => null,
                            'mapped' => false,
                            'required' => false,
                            'label' => 'Visuel',
                            'attr' => [
                                'class' => 'form-control',
                            ],
                        ])


            // ->add('visuel', DropzoneType::class, array('data_class' => null))
            ->add('lienDescriptif',null,[
                'attr' => [
                    'class' => 'form-control',
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Campervan::class,
        ]);
    }
}
