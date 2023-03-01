<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{


    // #[Route('/', name: 'default')]
    // // function
    // public function default(): Response
    // {
    //     // // if user is logged in, redirect to home page
    //     // if ($this->getUser()) {
    //     //     return $this->redirectToRoute('app_home');
    //     // }
    //     // else redirect to login page
    //     return $this->redirectToRoute('app_login');
    // }



    #[Route('/', name: 'app_home')]
    public function index(): Response
    {
        // if user is logged in, redirect to home page
        if ($this->getUser()) {

            return $this->render('home/index.html.twig', [
                'controller_name' => 'HomeController',
            ]);
        }

        // else redirect to login page
        return $this->redirectToRoute('app_login');

    }
}
