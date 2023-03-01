<?php

namespace App\Form;

use App\Entity\Agence;
// adresse entity
use App\Entity\Adresse;
// adresse form
use App\Form\AdresseType;
// form user
use App\Form\UserType;

// entity User
use App\Entity\User;
// adresse repository
use App\Repository\AdresseRepository;
// entity type
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\UX\Dropzone\Form\DropzoneType;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\CallbackTransformer;
// FileType
use Symfony\Component\Form\Extension\Core\Type\FileType;
// vich uploader
use Vich\UploaderBundle\Form\Type\VichFileType;
// use Vich\UploaderBundle\Form\Type\VichImageType;
use Vich\UploaderBundle\Form\Type\VichImageType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
// textfield type
use Symfony\Component\Form\Extension\Core\Type\TextType;
// artgris file bundle
use Artgris\Bundle\FileManagerBundle\Form\Type\ArtgrisFileType;



class AgenceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder

            // add user entitytype
            ->add('user', EntityType::class, [
                // mapped => false
                'mapped' => false,
                'class' => User::class,
                // choice label nom et prenom
                // 'choice_label' => 'nom',
                'choice_label' => 'email',
                // expanded => true
                'expanded' => false,
                'label' => false,
                'attr' => [
                    'class' => 'form-control',
                ],
            ])


            // get collection users from agence entity




            ->add('nom', null, [
                'required' => true,
                'label' => 'Nom',
                'attr' => [
                    'class' => 'form-control',
                ],
            ])
            ->add('nom_EN', null, [
                'required' => false,
                'label' => 'Nom Anglais',
                'attr' => [
                    'class' => 'form-control',
                ],
            ])
            ->add('nom_NL', null, [
                'required' => false,
                'label' => 'Nom Néerlandais',
                'attr' => [
                    'class' => 'form-control',
                ],
            ])
            ->add('nom_DE', null, [
                'required' => false,
                'label' => 'Nom Allemand',
                'attr' => [
                    'class' => 'form-control',
                ],
            ])
            ->add('idLocpro', null, [
                'required' => true,
                'label' => 'ID Locpro',
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Par exemple: AGBSLYON ou AGLI...',
                ],
            ])
            // type agence
            ->add('type', ChoiceType::class, [
                'required' => true,
                'label' => 'Type',
                'attr' => [
                    'class' => 'form-control',
                ],
                'multiple' => false,
                'expanded' => false,
                'choices'  => [
                  'Agence propre' => 'Agence propre',
                  'Franchise' => 'Franchise',
                ],
            ])

            // email

            ->add('email', null, [
                'required' => false,
                'label' => 'Email',
                'attr' => [
                    'class' => 'form-control',
                ],
            ])

            ->add('description',CKEditorType::class, [
                'label' => false,
                'attr' => [
                    'class' => 'form-control',
                ],
            ]
            )
            ->add('description_EN',CKEditorType::class
            , [
                'label' => false,
                'attr' => [
                    'class' => 'form-control',
                ],
            ]
            )
            ->add('description_DE',CKEditorType::class, [
                'label' => false,
                'attr' => [
                    'class' => 'form-control',
                ],
            ]
            )
            ->add('description_NL',CKEditorType::class, [
                'label' => false,
                'attr' => [
                    'class' => 'form-control',
                ],
            ]
            )



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


            // ->add('localisation', null, [
            //     'required' => true,
            //     'label' => 'Localisation',
            //     'attr' => [
            //         'class' => 'form-control',
            //         'placeholder' => 'Lat: 48.856614, Long: 2.3522219',
            //     ],
            // ])

            // longitude
            ->add('longitude', null, [
                'required' => false,
                'label' => 'Longitude',
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => '2.3522219',
                ],
            ])

            // latitude
            ->add('latitude', null, [
                'required' => false,
                'label' => 'Latitude',
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => '48.856614',
                ],
            ])

            ->add('telephone',null, [
                'required' => true,
                'label' => 'Téléphone',
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => '+33661626364',
                ],
            ])

                // horaires datetype field
            ->add('horaires', TextType::class, [
                'required' => true,
                'label' => 'Horaires',
                'attr' => [
                    'class' => 'form-control',
                    // placeholder
                    'placeholder' => 'Lundi - Vendredi : 9h - 18h',
                ],
            ])

                // access entity adresse and add it to agence form
            ->add('adresse', AdresseType::class, [
                'required' => true,
                // mapped false
                'mapped' => true,
                'label' => 'Adresse',
                'attr' => [
                    'class' => 'form-control',
                ],
            ])





        ;


        // Data transformer
        $builder->get('type')
            ->addModelTransformer(new CallbackTransformer(
                function ($typeArray) {
                     // transform the array to a string
                     return count($typeArray)? $typeArray[0]: null;
                },
                function ($typeString) {
                     // transform the string back to an array
                     return [$typeString];
                }
        ));





    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Agence::class,

        ]);


    }
}
