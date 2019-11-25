<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\HttpFoundation\Request;

use App\Entity\User;
use App\Form\UserType;
use App\Repository\userRepository;

class SecurityController extends AbstractController
{
    /**
     * @Route("/login", name="app_login")
     */
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        // if ($this->getUser()) {
        //    $this->redirectToRoute('target_path');
        // }

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/login.html.twig', 
            [
                'last_username' => $lastUsername, 
                'error' => $error
            ]
        );
    }

    /**
     * @Route("/logout", name="app_logout")
     */
    public function logout()
    {
        throw new \Exception('This method can be blank - it will be intercepted by the logout key on your firewall');
    }

    //   /**
    //  * @Route("/Usernew", name="security_new", methods={"GET","POST"})
    //  */
    // public function new(Request $request): Response
    // {
    //     $user = new user();
    //     $form = $this->createForm(userType::class, $user);
    //     $form->handleRequest($request);

    //     if ($form->isSubmitted() && $form->isValid()) {
    //         $entityManager = $this->getDoctrine()->getManager();
    //         $entityManager->persist($user);
    //         $entityManager->flush();

    //         return $this->render('security/login.html.twig', ['last_username' => $lastUsername, 'error' => $error]);
            
    //     }

    //     return $this->render('security/new.html.twig', [
    //         'user' => $user,
    //         'form' => $form->createView(),
    //     ]);
    // }


    public function testNotShowCategory()
    {
        // Request /category 
        $this->client->request('GET', '/category');

        $this ->denyAccessUnlessGranted('ROLE_USER');
        
    }
}
