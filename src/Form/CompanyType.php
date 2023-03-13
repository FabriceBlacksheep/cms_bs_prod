<?php

namespace App\Form;

use App\Entity\Company;
use App\Entity\Agence;
// Agence

// FileType

// entity type
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CompanyType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Name', null, [
                'required' => true,
                'label' => 'Nom',
                'attr' => [
                    'class' => 'form-control',
                ],
            ])
            ->add('siren', null, [
                'required' => true,
                'label' => 'Siren',
                'attr' => [
                    'class' => 'form-control',
                ],
            ])
            ->add('siret', null, [
                'required' => true,
                'label' => 'Siret',
                'attr' => [
                    'class' => 'form-control',
                ],
            ])
            ->add('dateCreation', null, [
                'required' => true,
                'label' => 'Date de création',
                'attr' => [
                    'class' => 'form-control',
                ],
            ])
            ->add('tvaIntra', null, [
                // 'required' => true,
                'label' => 'Tva Intra',
                'attr' => [
                    'class' => 'form-control',
                    ],
                    ])
                            // access entity adresse and add it to agence form
                ->add('adresse', AdresseType::class, [

                                // mapped false
                                'mapped' => true,
                                'label' => 'Adresse',
                                'attr' => [
                                    'class' => 'form-control',
                                ],
                            ])


                                // agences choice type of agencies not yet assigned to company

                           // agence choice
                           ->add('agences', EntityType::class, [
                            // mapped => false
                            'label' => 'Choisir la ou les agences associées à la société',
                            'mapped' => true,
                            // multiple => true
                            'multiple' => true,
                            'class' => Agence::class,
                            // choice label nom et prenom
                            // 'choice_label' => 'nom',
                            'choice_label' => 'nom',
                            // expanded => true
                            'expanded' => true,

                            "required" => true,
                            'attr' => [
                                'class' => 'form-control',
                            ],
                        ])



        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Company::class,
        ]);
    }
}
