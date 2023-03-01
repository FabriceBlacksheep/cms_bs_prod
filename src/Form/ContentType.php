<?php

namespace App\Form;

use App\Entity\Content;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
// FileType
use Symfony\Component\Form\Extension\Core\Type\FileType;
use FOS\CKEditorBundle\Form\Type\CKEditorType;

class ContentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        // build form for content entity with category choice
        $builder
            ->add('title',null, [
                'required' => true,
                'label' => 'Titre',
                'attr' => [
                    'class' => 'form-control',
                ],
            ])
            ->add('title_EN',null, [
                'required' => false,
                'label' => 'Titre ANGLAIS',
                'attr' => [
                    'class' => 'form-control col-3',
                ],
            ])
            ->add('title_DE',null, [
                'required' => false,
                'label' => 'Titre ALLEMAND',
                'attr' => [
                    'class' => 'form-control col-3',
                ],
            ])
            ->add('title_NL',null, [
                'required' => false,
                'label' => 'Titre NÉERLANDAIS',
                'attr' => [
                    'class' => 'form-control col-3',
                ],
            ])
            ->add('description',CKEditorType::class
            , [
                'label' => 'Déscription',
                'attr' => [
                    'class' => 'form-control',
                ],
            ]
            )
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
            ->add('h1',null, [
                'required' => true,
                'label' => 'H1',
                'attr' => [
                    'class' => 'form-control',
                ],
            ])
            ->add('h1_EN',null, [
                'required' => true,
                'label' => 'H1 ANGLAIS',
                'attr' => [
                    'class' => 'form-control',
                ],
            ])
            ->add('h1_DE',null, [
                'required' => true,
                'label' => 'H1 ALLEMAND',
                'attr' => [
                    'class' => 'form-control',
                ],
            ])
            ->add('h1_NL',null, [
                'required' => true,
                'label' => 'H1 NÉERLANDAIS',
                'attr' => [
                    'class' => 'form-control',
                ],
            ])
            ->add('slug',null, [
                'required' => true,
                'label' => 'Slug',
                'attr' => [
                    'class' => 'form-control',
                ],
            ])
            ->add('slug_EN',null, [
                'required' => true,
                'label' => 'Slug ANGLAIS',
                'attr' => [
                    'class' => 'form-control',
                ],
            ])
            ->add('slug_DE',null, [
                'required' => true,
                'label' => 'Slug ALLEMAND',
                'attr' => [
                    'class' => 'form-control',
                ],
            ])
            ->add('slug_NL',null, [
                'required' => true,
                'label' => 'Slug NÉERLANDAIS',
                'attr' => [
                    'class' => 'form-control',
                ],
            ])
            // category choice
            ->add('categories', EntityType::class, [
                'class' => 'App\Entity\Category',
                'choice_label' => 'title',
                'multiple' => true,
                'expanded' => true,
                'attr' => [
                    'class' => 'form-control',
                ],
            ])


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
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Content::class,
        ]);
    }
}
