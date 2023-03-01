<?php

namespace App\Form;

use App\Entity\Adresse;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AdresseType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('number', null, [
                'required' => false,
                'label' => 'Numéro',
                'attr' => [
                    'class' => 'form-control',
                ],
            ])
            ->add('street', null, [
                'required' => false,
                'label' => 'Rue',
                'attr' => [
                    'class' => 'form-control',
                ],
            ])
            ->add('zipcode', null, [
                'required' => false,
                'label' => 'Code Postal',
                'attr' => [
                    'class' => 'form-control',
                ],
            ])
            ->add('city', null, [
                'required' => false,
                'label' => 'Ville',
                'attr' => [
                    'class' => 'form-control',
                ],
            ])
            ->add('country', null, [
                'required' => false,
                'label' => 'Pays',
                'attr' => [
                    'class' => 'form-control',
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Adresse::class,
        ]);
    }
}
