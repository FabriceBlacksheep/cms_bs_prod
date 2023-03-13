<?php

namespace App\Controller;

use App\Entity\Stateofplay;
use App\Form\StateofplayType;
use App\Repository\StateofplayRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/Stateofplay')]
class StateofplayController extends AbstractController
{
    #[Route('/', name: 'app_Stateofplay_index', methods: ['GET'])]
    public function index(StateofplayRepository $StateofplayRepository): Response
    {
        return $this->render('Stateofplay/index.html.twig', [
            'Stateofplays' => $StateofplayRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_Stateofplay_new', methods: ['GET', 'POST'])]
    public function new(Request $request, StateofplayRepository $StateofplayRepository): Response
    {
        $Stateofplay = new Stateofplay();
        $form = $this->createForm(StateofplayType::class, $Stateofplay);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $StateofplayRepository->save($Stateofplay, true);

            return $this->redirectToRoute('app_Stateofplay_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('Stateofplay/new.html.twig', [
            'Stateofplay' => $Stateofplay,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_Stateofplay_show', methods: ['GET'])]
    public function show(Stateofplay $Stateofplay): Response
    {
        return $this->render('Stateofplay/show.html.twig', [
            'Stateofplay' => $Stateofplay,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_Stateofplay_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Stateofplay $Stateofplay, StateofplayRepository $StateofplayRepository): Response
    {
        $form = $this->createForm(StateofplayType::class, $Stateofplay);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $StateofplayRepository->save($Stateofplay, true);

            return $this->redirectToRoute('app_Stateofplay_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('Stateofplay/edit.html.twig', [
            'Stateofplay' => $Stateofplay,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_Stateofplay_delete', methods: ['POST'])]
    public function delete(Request $request, Stateofplay $Stateofplay, StateofplayRepository $StateofplayRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$Stateofplay->getId(), $request->request->get('_token'))) {
            $StateofplayRepository->remove($Stateofplay, true);
        }

        return $this->redirectToRoute('app_Stateofplay_index', [], Response::HTTP_SEE_OTHER);
    }
}
