<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
/**campervans */
use App\Entity\Campervan;
use App\Repository\CampervanRepository;
/**agences */
use App\Entity\Agence;
use App\Repository\AgenceRepository;
/**content */
use App\Entity\Content;
use App\Repository\ContentRepository;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Serializer;




class ApiController extends AbstractController
{
    #[Route('/api', name: 'app_api')]
    public function index(): Response
    {
        return $this->render('api/index.html.twig', [
            'controller_name' => 'ApiController',
        ]);
    }

/**VANS API */
// route /api/v1/vans french
    #[Route('/api/v1/vans/fr', name: 'app_api_vans_fr')]
     public function vans(CampervanRepository $campervanRepository): Response
     {
        // return camper van list
        $campervans = $campervanRepository->findAll();

        // return only the id and the name of the campervan
        $data = [];
        foreach ($campervans as $campervan) {
            $data[] = [
                'id' => $campervan->getId(),
                'name' => $campervan->getNom(),
                'category' => $campervan->getModele(),
                'description' => $campervan->getDescription(),
                'visiteVirtuelle' => $campervan->getVisiteVirtuelle(),
                'visuel' => $campervan->getVisuel(),
                'lienDescriptif' => $campervan->getLienDescriptif(),
                'idLocpro' => $campervan->getIdLocpro(),
                'price' => $campervan->getPrice(),
                'Gallery' => $campervan->getImgGallery(),


            ];
        }

        return $this->json($data);

     }

     // route /api/v1/vans English
    #[Route('/api/v1/vans/en', name: 'app_api_vans_en')]
    public function vansEn(CampervanRepository $campervanRepository): Response
    {
       // return camper van list
       $campervans = $campervanRepository->findAll();

       // return only the id and the name of the campervan
       $data = [];
       foreach ($campervans as $campervan) {
           $data[] = [
            'id' => $campervan->getId(),
            'name' => $campervan->getNom(),
            'category' => $campervan->getModele(),
            'description' => $campervan->getDescriptionEN(),
            'visiteVirtuelle' => $campervan->getVisiteVirtuelle(),
            'visuel' => $campervan->getVisuel(),
            'lienDescriptif' => $campervan->getLienDescriptif(),
            'idLocpro' => $campervan->getIdLocpro(),
            'price' => $campervan->getPrice(),
            'Gallery' => $campervan->getImgGallery(),

           ];
       }

       return $this->json($data);

    }

     // route /api/v1/vans Deutsch
     #[Route('/api/v1/vans/de', name: 'app_api_vans_de')]
     public function vansDe(CampervanRepository $campervanRepository): Response
     {
        // return camper van list
        $campervans = $campervanRepository->findAll();

        // return only the id and the name of the campervan
        $data = [];
        foreach ($campervans as $campervan) {
            $data[] = [
                'id' => $campervan->getId(),
                'name' => $campervan->getNom(),
                'category' => $campervan->getModele(),
                'description' => $campervan->getDescriptionDE(),
                'visiteVirtuelle' => $campervan->getVisiteVirtuelle(),
                'visuel' => $campervan->getVisuel(),
                'lienDescriptif' => $campervan->getLienDescriptif(),
                'idLocpro' => $campervan->getIdLocpro(),
                'price' => $campervan->getPrice(),
                'Gallery' => $campervan->getImgGallery(),

            ];
        }

        return $this->json($data);

     }

          // route /api/v1/vans Nederlands
     #[Route('/api/v1/vans/nl', name: 'app_api_vans_nl')]
          public function vansNl(CampervanRepository $campervanRepository): Response
          {
             // return camper van list
             $campervans = $campervanRepository->findAll();

             // return only the id and the name of the campervan
             $data = [];
             foreach ($campervans as $campervan) {
                 $data[] = [
                    'id' => $campervan->getId(),
                    'name' => $campervan->getNom(),
                    'category' => $campervan->getModele(),
                    'description' => $campervan->getDescriptionNL(),
                    'visiteVirtuelle' => $campervan->getVisiteVirtuelle(),
                    'visuel' => $campervan->getVisuel(),
                    'lienDescriptif' => $campervan->getLienDescriptif(),
                    'idLocpro' => $campervan->getIdLocpro(),
                    'price' => $campervan->getPrice(),
                    'Gallery' => $campervan->getImgGallery(),

                 ];
             }

             return $this->json($data);

          }

/**AGENCES API */
// route /api/v1/agences french
    #[Route('/api/v1/agences/fr', name: 'app_api_agences_fr')]
    public function agences(AgenceRepository $agenceRepository): Response
    {
       // return agence list
       $agences = $agenceRepository->findAll();

       // return only the id and the name of the agence
       $data = [];
       foreach ($agences as $agence) {
           $data[] = [
               'id' => $agence->getId(),
               'name' => $agence->getNom(),
               'description' => $agence->getDescription(),
               'adresse' => $agence->getAdresse(),
               'telephone' => $agence->getTelephone(),
               'email' => $agence->getEmail(),
               'horaires' => $agence->getHoraires(),
               'visuel' => $agence->getVisuel(),
              ];

            }

            return $this->json($data);

        }
// route /api/v1/agences English
    #[Route('/api/v1/agences/en', name: 'app_api_agences_en')]
    public function agencesEn(AgenceRepository $agenceRepository): Response
    {
       // return agence list
       $agences = $agenceRepository->findAll();

       // return only the id and the name of the agence
       $data = [];
       foreach ($agences as $agence) {
           $data[] = [
            'id' => $agence->getId(),
            'name' => $agence->getNomEN(),
            'description' => $agence->getDescriptionEN(),
            'adresse' => $agence->getAdresse(),
            'telephone' => $agence->getTelephone(),
            'email' => $agence->getEmail(),
            'horaires' => $agence->getHoraires(),
            'visuel' => $agence->getVisuel(),
              ];

            }

            return $this->json($data);

        }
// route /api/v1/agences Deutsch
    #[Route('/api/v1/agences/de', name: 'app_api_agences_de')]
    public function agencesDe(AgenceRepository $agenceRepository): Response
    {
       // return agence list
       $agences = $agenceRepository->findAll();

       // return only the id and the name of the agence
       $data = [];
       foreach ($agences as $agence) {
           $data[] = [
            'id' => $agence->getId(),
            'name' => $agence->getNomDE(),
            'description' => $agence->getDescriptionDE(),
            'adresse' => $agence->getAdresse(),
            'telephone' => $agence->getTelephone(),
            'email' => $agence->getEmail(),
            'horaires' => $agence->getHoraires(),
            'visuel' => $agence->getVisuel(),
              ];

            }

            return $this->json($data);

        }
// route /api/v1/agences Nederlands
    #[Route('/api/v1/agences/nl', name: 'app_api_agences_nl')]
    public function agencesNl(AgenceRepository $agenceRepository): Response
    {
       // return agence list
       $agences = $agenceRepository->findAll();

       // return only the id and the name of the agence
       $data = [];
       foreach ($agences as $agence) {
           $data[] = [
            'id' => $agence->getId(),
            'name' => $agence->getNomNL(),
            'description' => $agence->getDescriptionNL(),
            'adresse' => $agence->getAdresse(),
            'telephone' => $agence->getTelephone(),
            'email' => $agence->getEmail(),
            'horaires' => $agence->getHoraires(),
            'visuel' => $agence->getVisuel(),
              ];

            }

            return $this->json($data);

        }



// route /api/vi/content/fr
    #[Route('/api/v1/content/fr', name: 'app_api_content_fr')]
    public function content(ContentRepository $contentRepository): Response
    {
       // return content list
       $contents = $contentRepository->findAll();

       // return only the id and the name of the content
       $data = [];
       foreach ($contents as $content) {

        // get the categories of the content
        $categories = [];
        foreach ($content->getCategories() as $category) {
            $categories[] = [
                'id' => $category->getId(),
                'name' => $category->getTitle(),
            ];
        }


           $data[] = [
               'id' => $content->getId(),
               'title' => $content->getTitle(),
               'description' => $content->getDescription(),
               'h1' => $content->getH1(),
               'slug' => $content->getSlug(),
               'visuel' => $content->getVisuel(),
               'category' => $categories,
               'file' => $content->getFile(),

              ];

            }

            return $this->json($data);

        }

// route /api/v1/content/en
    #[Route('/api/v1/content/en', name: 'app_api_content_en')]
    public function contentEn(ContentRepository $contentRepository): Response
    {
       // return content list
       $contents = $contentRepository->findAll();

       // return only the id and the name of the content
       $data = [];
       foreach ($contents as $content) {

                // get the categories of the content
                $categories = [];
                foreach ($content->getCategories() as $category) {
                    $categories[] = [
                        'id' => $category->getId(),
                        'name' => $category->getTitle(),
                    ];
                }

           $data[] = [
               'id' => $content->getId(),
               'title' => $content->getTitleEN(),
               'description' => $content->getDescriptionEN(),
               'h1' => $content->getH1EN(),
               'slug' => $content->getSlugEN(),
               'visuel' => $content->getVisuel(),
               'category' => $categories,
               'file' => $content->getFile(),
              ];

            }

            return $this->json($data);

        }

// route /api/v1/content/de
    #[Route('/api/v1/content/de', name: 'app_api_content_de')]
    public function contentDe(ContentRepository $contentRepository): Response
    {
       // return content list
       $contents = $contentRepository->findAll();

       // return only the id and the name of the content
       $data = [];
       foreach ($contents as $content) {
                    // get the categories of the content
                    $categories = [];
                    foreach ($content->getCategories() as $category) {
                        $categories[] = [
                            'id' => $category->getId(),
                            'name' => $category->getTitle(),
                        ];
                    }
           $data[] = [
            'id' => $content->getId(),
            'title' => $content->getTitleDE(),
            'description' => $content->getDescriptionDE(),
            'h1' => $content->getH1DE(),
            'slug' => $content->getSlugDE(),
            'visuel' => $content->getVisuel(),
            'category' => $categories,
            'file' => $content->getFile(),

              ];

            }

            return $this->json($data);

        }

// route /api/v1/content/nl
    #[Route('/api/v1/content/nl', name: 'app_api_content_nl')]
    public function contentNl(ContentRepository $contentRepository): Response
    {
       // return content list
       $contents = $contentRepository->findAll();


       // return only the id and the name of the content
       $data = [];
       foreach ($contents as $content) {
                // get the categories of the content
                $categories = [];
                foreach ($content->getCategories() as $category) {
                    $categories[] = [
                        'id' => $category->getId(),
                        'name' => $category->getTitle(),
                    ];
                }
           $data[] = [
            'id' => $content->getId(),
            'title' => $content->getTitleNL(),
            'description' => $content->getDescriptionNL(),
            'h1' => $content->getH1NL(),
            'slug' => $content->getSlugNL(),
            'visuel' => $content->getVisuel(),
            'category' => $categories,
            'file' => $content->getFile(),

              ];

            }

            return $this->json($data);

        }


}
