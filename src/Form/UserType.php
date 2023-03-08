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
// FileType
use Symfony\Component\Form\Extension\Core\Type\FileType;
// PasswordType
use Symfony\Component\Form\Extension\Core\Type\PasswordType;




class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {



        $builder

        // PictureProfile file type
        ->add('PictureProfile', FileType::class, [
            'data_class' => null,
            'mapped' => false,
            'required' => false,
            'label' => 'Image de profil',
            'attr' => [
                'class' => 'form-control',
            ],
        ])


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

            // telephone
            ->add('Phone', null, [
                'label' => 'Telephone',
                'attr' => [
                    'placeholder' => 'Telephone',
                    'class' => 'form-control',
                ],
            ])


            ->add('roles', ChoiceType::class, [
                // 'is_granted_attribute' => 'ROLE_ADMIN',
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
                  'Client API' => 'ROLE_CLIENT_API',
                  'Client BLACKSHEEP' => 'ROLE_CLIENT_BLACKSHEEP',
                ],
            ])


            // if user has role ROLE_ADMIN


                ->add('agence', EntityType::class, [
                    // 'is_granted_attribute' => 'ROLE_ADMIN',
                    // mapped => false
                    'label' => 'Choisir une agence',
                    'mapped' => true,
                    // multiple => true
                    'multiple' => true,
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




                ->add('password', PasswordType::class, [
                    'hash_property_path' => 'password',
                    'label' => 'Mot de passe',
                    'mapped' => false,
                    'attr' => [
                        'class' => 'form-control pwd',
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
