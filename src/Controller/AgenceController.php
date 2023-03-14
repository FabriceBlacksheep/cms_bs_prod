<?php

namespace App\Controller;

use App\Entity\Agence;
use App\Entity\Adresse;

use App\Form\AgenceType;
use App\Form\AdresseType;
// company form type
use App\Form\CompanyType;
// company
use App\Repository\CompanyRepository;
use App\Entity\Company;

use App\Repository\AgenceRepository;
use App\Repository\AdresseRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/agence')]
class AgenceController extends AbstractController
{
    #[Route('/', name: 'app_agence_index', methods: ['GET'])]
    public function index(AgenceRepository $agenceRepository): Response
    {
        return $this->render('agence/index.html.twig', [


            'agences' => $agenceRepository->findAll(),



        ]);
    }

    #[Route('/new', name: 'app_agence_new', methods: ['GET', 'POST'])]
    public function new(Request $request, AgenceRepository $agenceRepository, AdresseRepository $adresseRepository): Response
    {
        $agence = new Agence();
        $form = $this->createForm(AgenceType::class, $agence);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            // get company form
            $company = $form->get('company')->getData();

            // if company is not null agence set company
            if ($company) {
                $agence->setCompany($company);
            }





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
            $agence->setVisuel($fileName);
            // set agence active to true
            $agence->setActive(true);

            // get adresse form
            $adresse = $form->get('adresse')->getData();

            // set agence adresse
            $agence->setAdresse($adresse);



            $agenceRepository->save($agence, true);

            // send flash message
            $this->addFlash('success', 'Agence ajoutée avec succès');


            return $this->redirectToRoute('app_agence_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('agence/new.html.twig', [
            'agence' => $agence,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_agence_show', methods: ['GET'])]
    public function show(Agence $agence): Response
    {


        // return users of this agence
        $users = $agence->getUsers();




        return $this->render('agence/show.html.twig', [
            'agence' => $agence,
            'users' => $users,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_agence_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Agence $agence, AgenceRepository $agenceRepository): Response
    {

        // get agence adresse
        $adresse = $agence->getAdresse();

        // prefilled form



        $form = $this->createForm(AgenceType::class, $agence);
        $form->handleRequest($request);



        if ($form->isSubmitted() && $form->isValid()) {


            // COMPANY

            // check if current agence has company and compare to form company
            if ($agence->getCompany() && $agence->getCompany() != $form->get('company')->getData()) {

                $message='Attention, cette agence est déjà associée à une autre société';
                //send alert message
                $this->addFlash('error', $message);

                // redurect to edit page with alert message
                return $this->redirectToRoute('app_agence_edit', ['id' => $agence->getId()], Response::HTTP_SEE_OTHER);



            } else {
                // get company form
                $company = $form->get('company')->getData();

                // if company is not null agence set company
                if ($company) {
                    $agence->setCompany($company);
                }
            }




            // check if a file already exists for this entity and upload form is empty
            if ($agence->getVisuel() && !$form->get('visuel')->getData()) {
                // set the old file name
                $agence->setVisuel($agence->getVisuel());
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
                $agence->setVisuel($fileName);

                   // get adresse form
                $adresse = $form->get('adresse')->getData();

            // set agence adresse
                $agence->setAdresse($adresse);



            }

            $agenceRepository->save($agence, true);

               // send flash message
               $this->addFlash('warning', 'Agence modifiée avec succès');

            return $this->redirectToRoute('app_agence_index', [], Response::HTTP_SEE_OTHER);
        }


        return $this->renderForm('agence/edit.html.twig', [
            'agence' => $agence,
            'form' => $form,
            //'visuel' => $agence->getVisuel(),

        ]);

    }

    #[Route('/{id}', name: 'app_agence_delete', methods: ['POST'])]
    public function delete(Request $request, Agence $agence, AgenceRepository $agenceRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$agence->getId(), $request->request->get('_token'))) {
            $agenceRepository->remove($agence, true);
        }

        // send flash message
        $this->addFlash('danger', 'Agence supprimée avec succès');

        return $this->redirectToRoute('app_agence_index', [], Response::HTTP_SEE_OTHER);
    }


    // route to set active or inactive post method
    #[Route('/{id}/active', name: 'app_agence_active', methods: ['POST'])]
    public function active(Agence $agence, AgenceRepository $agenceRepository): Response
    {
        $agence->setActive(!$agence->isActive());
        $agenceRepository->save($agence, true);

            // send flash message
            $this->addFlash('warning', 'Statut de l\'agence modifié avec succès');

        return $this->redirectToRoute('app_agence_index', [], Response::HTTP_SEE_OTHER);
    }

    // app_agence_search route post method
    #[Route('/search', name: 'app_agence_search', methods: ['POST'])]
    public function search(Request $request, AgenceRepository $agenceRepository): Response
    {
        $search = $request->request->get('search');
        // findByName
        $agences = $agenceRepository->findByName($search);




        return $this->render('agence/index.html.twig', [
            'agences' => $agences,
        ]);
    }



    /**API */

    //  api platform route return adresse of agence
    #[Route('/{id}/adresse', name: 'app_agence_adresse', methods: ['GET'])]
    public function adresse(Agence $agence): Response
    {
        $adresse = $agence->getAdresse();

        return $this->json($adresse, 200, [], ['groups' => 'adresse:read']);

    }




    // route API to return agences by company
    #[Route('/company/{id}', name: 'app_agence_company', methods: ['GET'])]
    public function company(Company $company): Response
    {
        $agences = $company->getAgences();

        return $this->json($agences, 200, [], ['groups' => 'agence:read']);
    }




}
