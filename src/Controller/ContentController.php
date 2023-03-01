<?php

namespace App\Controller;

use App\Entity\Content;
// category entity
use App\Entity\Category;
use App\Form\ContentType;
use App\Repository\ContentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/content')]
class ContentController extends AbstractController
{
    #[Route('/', name: 'app_content_index', methods: ['GET'])]
    public function index(ContentRepository $contentRepository): Response
    {
        return $this->render('content/index.html.twig', [
            // send content and categories to the view
            'contents' => $contentRepository->findAll(),


        ]);
    }

    #[Route('/new', name: 'app_content_new', methods: ['GET', 'POST'])]
    public function new(Request $request, ContentRepository $contentRepository): Response
    {
        $content = new Content();
        $form = $this->createForm(ContentType::class, $content);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

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
              $content->setVisuel($fileName);
            $contentRepository->save($content, true);

            return $this->redirectToRoute('app_content_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('content/new.html.twig', [
            'content' => $content,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_content_show', methods: ['GET'])]
    public function show(Content $content): Response
    {
        return $this->render('content/show.html.twig', [
            'content' => $content,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_content_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Content $content, ContentRepository $contentRepository): Response
    {
        $form = $this->createForm(ContentType::class, $content);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            if ($content->getVisuel() && !$form->get('visuel')->getData()) {
                // set the old file name
                $content->setVisuel($content->getVisuel());
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
                $content->setVisuel($fileName);
            }

            $contentRepository->save($content, true);

            return $this->redirectToRoute('app_content_index', [], Response::HTTP_SEE_OTHER);
        }

        // loop to get catgories of a content
        $categories = [];
        foreach ($content->getCategories() as $category) {
            $categories[] = $category->getId();
        }



        return $this->renderForm('content/edit.html.twig', [
            'content' => $content,
            'categories' => $categories,
            'form' => $form,
        ]);
    }











    #[Route('/{id}', name: 'app_content_delete', methods: ['POST'])]
    public function delete(Request $request, Content $content, ContentRepository $contentRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$content->getId(), $request->request->get('_token'))) {
            $contentRepository->remove($content, true);
        }

        return $this->redirectToRoute('app_content_index', [], Response::HTTP_SEE_OTHER);
    }
}
