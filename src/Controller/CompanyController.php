<?php

namespace App\Controller;

use App\Entity\Company;
use App\Form\CompanyType;
// agence
use App\Entity\Agence;
use App\Form\AgenceType;
// agence repository
use App\Repository\AgenceRepository;
use App\Repository\CompanyRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
// array collection
use Doctrine\Common\Collections\ArrayCollection;


#[Route('/company')]
class CompanyController extends AbstractController
{
    #[Route('/', name: 'app_company_index', methods: ['GET'])]
    public function index(CompanyRepository $companyRepository): Response
    {
        return $this->render('company/index.html.twig', [
            'companies' => $companyRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_company_new', methods: ['GET', 'POST'])]
    public function new(Request $request, CompanyRepository $companyRepository): Response
    {
        $company = new Company();
        $form = $this->createForm(CompanyType::class, $company);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $companyRepository->save($company, true);

            return $this->redirectToRoute('app_company_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('company/new.html.twig', [
            'company' => $company,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_company_show', methods: ['GET'])]
    public function show(Company $company): Response
    {


        // get unique users from agences of company
        $users = new ArrayCollection();
        foreach ($company->getAgences() as $agence) {
            foreach ($agence->getUsers() as $user) {
                if (!$users->contains($user)) {
                    $users->add($user);
                }
            }
        }






        return $this->render('company/show.html.twig', [
            'company' => $company,
            'users' => $users,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_company_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Company $company, CompanyRepository $companyRepository, AgenceRepository $agenceRepository): Response
    {
        $form = $this->createForm(CompanyType::class, $company);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $agences = $company->getAgences();
            $agencesFromCompany = $agenceRepository->findBy(['company' => $company->getId()]);

            foreach ($agences as $agence) {

                // if agence is already in an other company
                if ($agence->getCompany() && $agence->getCompany()->getId() !== $company->getId()) {
                    // flash message error
                    // set message

                    // company name where agence is already attached
                    $companyName = $agence->getCompany()->getName();





                    $message = $agence->getNom() . ' est déjà rattachée à la société ' . $companyName . '.';

                    $this->addFlash('error', $message);
                    // redirect to edit page
                    return $this->redirectToRoute('app_company_edit', ['id' => $company->getId()]);


                }

                else {
                    // agences set company id
                    $agence->setCompany($company);
                    $agenceRepository->save($agence, true);
                }

            }


            foreach ($agencesFromCompany as $agenceFromCompany) {
                if (!$agences->contains($agenceFromCompany)) {

                    // agences unset company id
                    $agenceFromCompany->setCompany(null);
                }
            }

            $companyRepository->save($company, true);





            return $this->redirectToRoute('app_company_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('company/edit.html.twig', [
            'company' => $company,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_company_delete', methods: ['POST'])]
    public function delete(Request $request, Company $company, CompanyRepository $companyRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$company->getId(), $request->request->get('_token'))) {
            $companyRepository->remove($company, true);
        }

        return $this->redirectToRoute('app_company_index', [], Response::HTTP_SEE_OTHER);
    }
}
