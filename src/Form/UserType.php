<?php

namespace App\Form;

use App\Entity\User;
// Agence
use App\Entity\Agence;



use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\CallbackTransformer;
// entity type
use Symfony\Bridge\Doctrine\Form\Type\EntityType;



class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', null, [
                'label' => 'Email',
                'attr' => [
                    'placeholder' => 'Email',
                    'class' => 'form-control',
                ],
            ])
            // nom
            ->add('Nom', null, [
                'label' => 'Nom',
                'attr' => [
                    'placeholder' => 'Nom',
                    'class' => 'form-control',
                ],
            ])
            // prenom
            ->add('Prenom', null, [
                'label' => 'Prenom',
                'attr' => [
                    'placeholder' => 'Prenom',
                    'class' => 'form-control',
                ],
            ])
            ->add('roles', ChoiceType::class, [
                'required' => true,
                'label' => 'Role',
                'attr' => [
                    'class' => 'form-control',
                ],
                'multiple' => false,
                'expanded' => false,
                'choices'  => [
                  'User' => 'ROLE_USER',
                  'Admin' => 'ROLE_ADMIN',
                  'Webmaster' => 'ROLE_WEBMASTER',
                ],
            ])


                // agence choice
                ->add('agence', EntityType::class, [
                    // mapped => false
                    'label' => 'Choisir une agence',
                    'mapped' => false,
                    'class' => Agence::class,
                    // choice label nom et prenom
                    // 'choice_label' => 'nom',
                    'choice_label' => 'nom',
                    // expanded => true
                    'expanded' => false,

                    "required" => true,
                    'attr' => [
                        'class' => 'form-control',
                    ],
                ])



            ->add('password', null, [
                'label' => 'Mot de passe',
                'attr' => [
                    'placeholder' => 'Mot de passe',
                    'class' => 'form-control',
                ],
            ])

        ;

        // Data transformer
        $builder->get('roles')
            ->addModelTransformer(new CallbackTransformer(
                function ($rolesArray) {
                     // transform the array to a string
                     return count($rolesArray)? $rolesArray[0]: null;
                },
                function ($rolesString) {
                     // transform the string back to an array
                     return [$rolesString];
                }
        ));

  }



    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
