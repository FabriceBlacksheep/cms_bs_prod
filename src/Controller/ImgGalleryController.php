<?php

namespace App\Controller;

use App\Entity\ImgGallery;
use App\Form\ImgGalleryType;
use App\Repository\ImgGalleryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/img/gallery')]
class ImgGalleryController extends AbstractController
{
    #[Route('/', name: 'app_img_gallery_index', methods: ['GET'])]
    public function index(ImgGalleryRepository $imgGalleryRepository): Response
    {
        return $this->render('img_gallery/index.html.twig', [
            'img_galleries' => $imgGalleryRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_img_gallery_new', methods: ['GET', 'POST'])]
    public function new(Request $request, ImgGalleryRepository $imgGalleryRepository): Response
    {
        $imgGallery = new ImgGallery();
        $form = $this->createForm(ImgGalleryType::class, $imgGallery);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $imgGalleryRepository->save($imgGallery, true);

            return $this->redirectToRoute('app_img_gallery_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('img_gallery/new.html.twig', [
            'img_gallery' => $imgGallery,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_img_gallery_show', methods: ['GET'])]
    public function show(ImgGallery $imgGallery): Response
    {
        return $this->render('img_gallery/show.html.twig', [
            'img_gallery' => $imgGallery,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_img_gallery_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, ImgGallery $imgGallery, ImgGalleryRepository $imgGalleryRepository): Response
    {
        $form = $this->createForm(ImgGalleryType::class, $imgGallery);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $imgGalleryRepository->save($imgGallery, true);

            return $this->redirectToRoute('app_img_gallery_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('img_gallery/edit.html.twig', [
            'img_gallery' => $imgGallery,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_img_gallery_delete', methods: ['POST'])]
    public function delete(Request $request, ImgGallery $imgGallery, ImgGalleryRepository $imgGalleryRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$imgGallery->getId(), $request->request->get('_token'))) {
            $imgGalleryRepository->remove($imgGallery, true);
        }

        return $this->redirectToRoute('app_img_gallery_index', [], Response::HTTP_SEE_OTHER);
    }

    #[Route('/delete/{id}', name: 'app_img_gallery_delete_by_picture', methods: ['GET', 'POST'])]
    public function deleteImg(ImgGallery $imgGallery, ImgGalleryRepository $imgGalleryRepository): Response
    {

        $data = json_decode($request->getContent(), true);
        dd($data);
        $id = $data['id'];

        $imgGalleryRepository->remove($imgGallery, true);

        return $this->redirectToRoute('app_img_gallery_index', [], Response::HTTP_SEE_OTHER);
    }
}
