<?php

namespace App\Form;

use App\Entity\Vehicule;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Entity\Campervan;

class VehiculeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder


            // Access list Campervans
            ->add('campervan', EntityType::class, [
                'class' => Campervan::class,
                'choice_label' => 'nom',
                'expanded' => false,
                'label' => false,
                'attr' => [
                    'class' => 'form-control',
                ],
            ])
            ->add('immatriculation')
            ->add('DateImmatriculation')
            ->add('numeroSerie')
            ->add('kilometrage')
            ->add('dateKilometrage')
            ->add('entreeParc')
            ->add('sortieParc')
            ->add('statut')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Vehicule::class,
        ]);
    }
}
