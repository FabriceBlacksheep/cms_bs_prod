<?php

namespace App\Controller;

use App\Entity\VanCaracteristique;
use App\Form\VanCaracteristiqueType;
use App\Repository\VanCaracteristiqueRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/van/caracteristique')]
class VanCaracteristiqueController extends AbstractController
{
    #[Route('/', name: 'app_van_caracteristique_index', methods: ['GET'])]
    public function index(VanCaracteristiqueRepository $vanCaracteristiqueRepository): Response
    {
        return $this->render('van_caracteristique/index.html.twig', [
            'van_caracteristiques' => $vanCaracteristiqueRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_van_caracteristique_new', methods: ['GET', 'POST'])]
    public function new(Request $request, VanCaracteristiqueRepository $vanCaracteristiqueRepository): Response
    {
        $vanCaracteristique = new VanCaracteristique();
        $form = $this->createForm(VanCaracteristiqueType::class, $vanCaracteristique);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $vanCaracteristiqueRepository->save($vanCaracteristique, true);

            return $this->redirectToRoute('app_van_caracteristique_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('van_caracteristique/new.html.twig', [
            'van_caracteristique' => $vanCaracteristique,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_van_caracteristique_show', methods: ['GET'])]
    public function show(VanCaracteristique $vanCaracteristique): Response
    {
        return $this->render('van_caracteristique/show.html.twig', [
            'van_caracteristique' => $vanCaracteristique,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_van_caracteristique_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, VanCaracteristique $vanCaracteristique, VanCaracteristiqueRepository $vanCaracteristiqueRepository): Response
    {
        $form = $this->createForm(VanCaracteristiqueType::class, $vanCaracteristique);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $vanCaracteristiqueRepository->save($vanCaracteristique, true);

            return $this->redirectToRoute('app_van_caracteristique_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('van_caracteristique/edit.html.twig', [
            'van_caracteristique' => $vanCaracteristique,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_van_caracteristique_delete', methods: ['POST'])]
    public function delete(Request $request, VanCaracteristique $vanCaracteristique, VanCaracteristiqueRepository $vanCaracteristiqueRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$vanCaracteristique->getId(), $request->request->get('_token'))) {
            $vanCaracteristiqueRepository->remove($vanCaracteristique, true);
        }

        return $this->redirectToRoute('app_van_caracteristique_index', [], Response::HTTP_SEE_OTHER);
    }
}
