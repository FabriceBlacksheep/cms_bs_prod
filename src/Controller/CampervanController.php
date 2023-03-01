<?php

namespace App\Controller;

use App\Entity\Campervan;
use App\Form\CampervanType;
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
        return $this->render('campervan/show.html.twig', [
            'campervan' => $campervan,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_campervan_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Campervan $campervan, CampervanRepository $campervanRepository): Response
    {
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





            $campervanRepository->save($campervan, true);

            return $this->redirectToRoute('app_campervan_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('campervan/edit.html.twig', [
            'campervan' => $campervan,
            'form' => $form,
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
