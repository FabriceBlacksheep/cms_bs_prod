<?php

namespace App\Controller;

//ImgGallery
use App\Entity\ImgGallery;


use App\Entity\Campervan;
use App\Form\CampervanType;
// VanCaracteristique
use App\Entity\VanCaracteristique;
// VanCaracteristique Repository
use App\Repository\VanCaracteristiqueRepository;

use App\Repository\CampervanRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/campervan')]
class CampervanController extends AbstractController
{
    #[Route('/', name: 'app_campervan_index', methods: ['GET'])]
    public function index(CampervanRepository $campervanRepository): Response
    {
        return $this->render('campervan/index.html.twig', [
            'campervans' => $campervanRepository->findAll(),
        ]);
    }



    #[Route('/new', name: 'app_campervan_new', methods: ['GET', 'POST'])]
    public function new(Request $request, CampervanRepository $campervanRepository): Response
    {
        $campervan = new Campervan();
        $form = $this->createForm(CampervanType::class, $campervan);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            // uploaded file
            $file = $form->get('visuel')->getData();

            // generate a unique name for the file before saving it
            $fileName = md5(uniqid()).'.'.$file->guessExtension();

            // move the file to the directory where brochures are stored
            $file->move(
                $this->getParameter('kernel.project_dir').'/public/upload',
                $fileName
            );

            // updates the 'brochureFilename' property to store the PDF file name

            // instead of its contents
            $campervan->setVisuel($fileName);




           // if agence chosen
           if($form->get('agence')->getData() != null){
            // get agence chosen
            $agence = $form->get('agence')->getData();
            // set agence to user
            // pass argument App\Entity\Agence
         //loop through agence
            foreach($agence as $agence){
                // add agence to user
                $campervan->addAgence($agence);
            }
        }

        // imgGallery

// check if a file already exists for this entity and upload form is empty
if ($campervan->getImgGallery() && !$form->get('imgGallery')->getData()) {
    // set the old file name
    $campervan->setImgGallery($campervan->getImgGallery());
} else {
    // uploaded file
    $file = $form->get('imgGallery')->getData();
    //  dd($file);

    // declare array
    $fileNameArray = [];


    //  loop through file
    foreach($file as $file){
        // generate a unique name for the file before saving it
        $fileName = md5(uniqid()).'.'.$file->guessExtension();
        // dd($fileName);
        // move the file to the directory where brochures are stored
        $file->move(
            $this->getParameter('kernel.project_dir').'/public/upload',
            $fileName

        );

        // push files in array
        array_push($fileNameArray, $fileName);



        // type App\Entity\ImgGallery
        $imgGallery = new ImgGallery();
        $imgGallery->setImgFile($fileNameArray);
        // $campervan->addImgGallery($imgGallery);

        // campervan setImgGallery App\Entity\ImgGallery
        $campervan->setImgGallery($imgGallery);


    }

            // dd($fileNameArray);




}




            $campervanRepository->save($campervan, true);

            return $this->redirectToRoute('app_campervan_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('campervan/new.html.twig', [
            'campervan' => $campervan,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_campervan_show', methods: ['GET'])]
    public function show(Campervan $campervan): Response
    {

        // retrieve caracteristique for current campervan id

        // get caracteristique by id

        if ($campervan->getCaracteristiques() != null) {
            $caracteristique = $campervan->getCaracteristiques()->getDescription();
            $engine = $campervan->getCaracteristiques()->getEngine();
            $performances = $campervan->getCaracteristiques()->getPerformances();
            $dimensions = $campervan->getCaracteristiques()->getDimensions();
            $layout = $campervan->getCaracteristiques()->getLayout();
            $equipements = $campervan->getCaracteristiques()->getEquipment();
        } else {
            $caracteristique = "Aucune caractéristique";
            $engine = "Aucun moteur";
            $performances = "Aucune performance";
            $dimensions = "Aucune dimension";
            $layout = "Aucun layout";
            $equipements =  "Aucun équipement";
        }

      if ($campervan->getImgGallery() != null) {
        $imgGallery = $campervan->getImgGallery();

        // get ImgFile from ImgGallery id
        $imgGallery = $imgGallery->getImgFile();


      } else {
        $imgGallery = null;
      }



        return $this->render('campervan/show.html.twig', [
            'campervan' => $campervan,
            'caracteristique' => $caracteristique,
            'engine' => $engine,
            'performances' => $performances,
            'dimensions' => $dimensions,
            'layout' => $layout,
            'equipements' => $equipements,
            'imgGallery' => $imgGallery,

        ]);
    }

    #[Route('/{id}/edit', name: 'app_campervan_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Campervan $campervan, CampervanRepository $campervanRepository): Response
    {


        // check if form send parameter "pictureTodelete"
        if ($request->request->get('pictureTodelete') != null) {
            // get picture to delete
            $pictureTodelete = $request->request->get('pictureTodelete');
            // get imgGallery from campervan if exist
            if ($campervan->getImgGallery() != null) {
                $imgGallery = $campervan->getImgGallery();
                // get ImgFile from ImgGallery id
                $imgGallery = $imgGallery->getImgFile();
                // dd($imgGallery);
                // remove picture from array
                $imgGallery = array_diff($imgGallery, [$pictureTodelete]);
                // dd($imgGallery);
                // set new array to campervan
                $campervan->getImgGallery()->setImgFile($imgGallery);
                // dd($campervan->getImgGallery()->getImgFile());
                // save campervan
                $campervanRepository->save($campervan, true);
                // redirect to edit page
                return $this->redirectToRoute('app_campervan_edit', ['id' => $campervan->getId()]);
            }
        }



        // get imgGallery from campervan if exist

        if ($campervan->getImgGallery() != null) {
            $imgGallery = $campervan->getImgGallery();
            // get ImgFile from ImgGallery id
            $imgGallery = $imgGallery->getImgFile();
        } else {
            $imgGallery = null;
        }


        $form = $this->createForm(CampervanType::class, $campervan);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {


 // check if a file already exists for this entity and upload form is empty
        if ($campervan->getVisuel() && !$form->get('visuel')->getData()) {
            // set the old file name
            $campervan->setVisuel($campervan->getVisuel());
        } else {
            // uploaded file
            $file = $form->get('visuel')->getData();
            // dd($file);
            // generate a unique name for the file before saving it
            $fileName = md5(uniqid()).'.'.$file->guessExtension();
            // dd($fileName);
            // move the file to the directory where brochures are stored
            $file->move(
                $this->getParameter('kernel.project_dir').'/public/upload',
                $fileName
            );
    // updates the 'brochureFilename' property to store the PDF file name
    // instead of its contents
            $campervan->setVisuel($fileName);
                }

            // check if a file already exists for this entity and upload form is empty
            if ($campervan->getImgGallery() && !$form->get('imgGallery')->getData()) {
                // set the old file name
                $campervan->setImgGallery($campervan->getImgGallery());
            } else {
                // uploaded file
                $file = $form->get('imgGallery')->getData();
                //  dd($file);

                // declare array
                $fileNameArray = [];


                //  loop through file
                foreach($file as $file){
                    // generate a unique name for the file before saving it
                    $fileName = md5(uniqid()).'.'.$file->guessExtension();
                    // dd($fileName);
                    // move the file to the directory where brochures are stored
                    $file->move(
                        $this->getParameter('kernel.project_dir').'/public/upload',
                        $fileName

                    );

                    // push files in array
                    array_push($fileNameArray, $fileName);



                    // type App\Entity\ImgGallery
                    $imgGallery = new ImgGallery();
                    $imgGallery->setImgFile($fileNameArray);
                    // $campervan->addImgGallery($imgGallery);

                    // campervan setImgGallery App\Entity\ImgGallery
                    $campervan->setImgGallery($imgGallery);


                }

            }


           // if agence chosen
           if($form->get('agence')->getData() != null){
            // get agence chosen
            $agence = $form->get('agence')->getData();
            // set agence to user
            // pass argument App\Entity\Agence
         //loop through agence
                    foreach($agence as $agence){
                        // add agence to user
                        $campervan->addAgence($agence);
                    }
             }

        // if caracteristique chosen
        if($form->get('Caracteristiques')->getData() != null){
            // get caracteristique chosen
            $caracteristique = $form->get('Caracteristiques')->getData();
            //dd($caracteristique);

            // set caracteristique to camperan ManyToOne
            // pass argument App\Entity\VanCaracteristique
            //loop through caracteristique

                $campervan->setCaracteristiques($caracteristique);

        }



            $campervanRepository->save($campervan, true);

            // reload page
            return $this->redirectToRoute('app_campervan_edit', ['id' => $campervan->getId()], Response::HTTP_SEE_OTHER);

            // return $this->redirectToRoute('app_campervan_index', [], Response::HTTP_SEE_OTHER);
        }


        return $this->renderForm('campervan/edit.html.twig', [
            'campervan' => $campervan,
            'form' => $form,
            'imgGallery' => $imgGallery,



        ]);
    }

    #[Route('/{id}', name: 'app_campervan_delete', methods: ['POST'])]
    public function delete(Request $request, Campervan $campervan, CampervanRepository $campervanRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$campervan->getId(), $request->request->get('_token'))) {
            $campervanRepository->remove($campervan, true);
        }

        return $this->redirectToRoute('app_campervan_index', [], Response::HTTP_SEE_OTHER);
    }



}
