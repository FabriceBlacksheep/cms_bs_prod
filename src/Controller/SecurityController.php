<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Doctrine\Persistence\ManagerRegistry as PersistenceManagerRegistry;
//entity manager
use Doctrine\ORM\EntityManagerInterface;
// user entity
use App\Entity\User;
// user repository
use App\Repository\UserRepository;
// json response
use Symfony\Component\HttpFoundation\JsonResponse;
// request
use Symfony\Component\HttpFoundation\Request;
// password hasher
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
// password validator
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoder;

class SecurityController extends AbstractController
{
    #[Route(path: '/login', name: 'app_login')]
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        // if ($this->getUser()) {
        //     return $this->redirectToRoute('target_path');
        // }

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/login.html.twig', ['last_username' => $lastUsername, 'error' => $error]);
    }

    #[Route(path: '/logout', name: 'app_logout')]
    public function logout(): void
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }


    // route loginJson
    #[Route(path: '/loginJson', name: 'app_login_json')]
    // function to return json response
    public function loginJson(AuthenticationUtils $authenticationUtils, Request $request, EntityManagerInterface $entityManager, UserPasswordHasherInterface $passwordHasher): JsonResponse
    {

        $status = '';
        $error = '';
        // get json data of form
        // dd($request);

        // get email from request
        $email = $request->request->get('email');
        // get password from request
        $password = $request->request->get('password');

        // get user from database
        $user = $entityManager->getRepository(User::class)->findOneBy(['email' => $email]);


        // check if user exists

        if (!$user) {
            $status = 'error';
            $error = 'User not found';
        } else {
            // check password

            $passwordHasher->hashPassword($user, $password);

            // dd($passwordHasher);


            if ($passwordHasher->isPasswordValid($user, $password)) {
                $status = 'success';
                $error = 'Login successful';
            } else {
                $status = 'error';
                $error = 'Password is incorrect';
            }
        }


        return new JsonResponse([
            'status' => $status,
            'error' => $error,

        ]);
    }


}
