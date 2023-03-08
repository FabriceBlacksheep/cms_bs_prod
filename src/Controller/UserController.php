<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Doctrine\ORM\EntityManagerInterface;

#[Route('/user')]
class UserController extends AbstractController
{
    #[Route('/', name: 'app_user_index', methods: ['GET'])]
    public function index(UserRepository $userRepository): Response
    {
// if user role is ROLE_ADMIN
        if($this->getUser()->getRoles()[0] == 'ROLE_ADMIN'){
            // get all users
            $users = $userRepository->findAll();
        return $this->render('user/index.html.twig', [
            'users' => $userRepository->findAll(),
        ]);

    }else{
        // get user by id
        $users = $userRepository->getUserById($this->getUser()->getId());
        return $this->render('error.html.twig', [
            'users' => $users,
        ]);


    }

}

    #[Route('/new', name: 'app_user_new', methods: ['GET', 'POST'])]
    public function new(Request $request, UserRepository $userRepository, UserPasswordHasherInterface $userPasswordHasher): Response
    {
        $user = new User();
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            // get PictureProfile from form
            $pictureProfile = $form->get('PictureProfile')->getData();

            // if pictureProfile is not null
            if($pictureProfile != null){
                // generate a unique name for the file before saving it
                $fileName = md5(uniqid()).'.'.$pictureProfile->guessExtension();
                // move the file to the directory where brochures are stored
                $pictureProfile->move(
                    $this->getParameter('kernel.project_dir').'/public/upload',
                    $fileName
                );
                // updates the 'brochureFilename' property to store the PDF file name
                // instead of its contents
                $user->setPictureProfile($fileName);
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
                            $user->addAgence($agence);
                        }
                    }


                    // encode the plain password
                    $user->setPassword(
                        $userPasswordHasher->hashPassword(
                            $user,
                            $form->get('password')->getData()
                        )
                    );

            // set role of user
            $user->setRoles($form->get('roles')->getData());



            $userRepository->save($user, true);

            return $this->redirectToRoute('app_user_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('user/new.html.twig', [
            'user' => $user,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_user_show', methods: ['GET'])]
    public function show(User $user, Request $request, UserRepository $userRepository): Response
    {

        // get id from url
        $id = $request->attributes->get('id');
        // getUserById
        $userShow = $userRepository->getUserById($id);

        // dd($user);

        return $this->render('user/show.html.twig', [
            'userShow' => $userShow,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_user_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, User $user, UserRepository $userRepository): Response
    {

        // get id from url
        $id = $request->attributes->get('id');
        // getUserById
        $userTodelete = $userRepository->getUserById($id);

        //



        $form = $this->createForm(UserType::class, $user);
        // return password not hashed
        $form->get('password')->setData($user->getPassword());





        $form->handleRequest($request);



        if ($form->isSubmitted() && $form->isValid()) {



                  // get PictureProfile from form
                  $pictureProfile = $form->get('PictureProfile')->getData();

                  // if pictureProfile is not null
                  if($pictureProfile != null){
                      // generate a unique name for the file before saving it
                      $fileName = md5(uniqid()).'.'.$pictureProfile->guessExtension();
                      // move the file to the directory where brochures are stored
                      $pictureProfile->move(
                          $this->getParameter('kernel.project_dir').'/public/upload',
                          $fileName
                      );
                      // updates the 'brochureFilename' property to store the PDF file name
                      // instead of its contents
                      $user->setPictureProfile($fileName);
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
                    $user->addAgence($agence);
                }
            }

            $userRepository->save($user, true);

            return $this->redirectToRoute('app_user_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('user/edit.html.twig', [
            'user' => $user,
            'form' => $form,
            'userTodelete' => $userTodelete
        ]);
    }

    #[Route('/{id}', name: 'app_user_delete', methods: ['POST'])]
    public function delete(Request $request, User $user, UserRepository $userRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$user->getId(), $request->request->get('_token'))) {
            $userRepository->remove($user, true);
        }

        return $this->redirectToRoute('app_user_index', [], Response::HTTP_SEE_OTHER);
    }


    // Route email to user to reset password
    #[Route('/reset-password/{token}', name: 'app_user_reset_password')]

    // Method to reset password
    public function resetPassword($token, Request $request, UserRepository $userRepository, UserPasswordHasherInterface $userPasswordHasher): Response
    {
        // Find user by token
        $user = $userRepository->findOneBy(['resetToken' => $token]);

        // If user is found
        if($user) {

            // If form is submitted
            if($request->isMethod('POST')) {

                // Encode password
                $user->setPassword(
                    $userPasswordHasher->hashPassword(
                        $user,
                        $request->request->get('password')
                    )
                );

                // Remove token
                $user->setResetToken(null);

                // Save user
                $userRepository->save($user, true);

                // Redirect to login page
                return $this->redirectToRoute('app_login');
            } else {

                // Render reset password form
                return $this->render('user/reset_password.html.twig', [
                    'token' => $token
                ]);
            }
        } else {

            // If user is not found, redirect to login page
            return $this->redirectToRoute('app_login');
        }
    }

}
