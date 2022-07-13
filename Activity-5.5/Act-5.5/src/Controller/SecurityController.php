<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\User;
use App\Form\ResgisterType;
use App\Repository\UserRepository;
class SecurityController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(): Response
    {
        return $this->render('profile/home.html.twig', [
            'controller_name' => 'SecurityController',
        ]);
    }

        /**
     * @Route("/Register", name="Regsiter")
     */
    public function SignUp(Request $request, ManagerRegistry $doctrine, UserPasswordEncoderInterface $userPasswordEncoder): Response
     {
    $User = new User();
    $form = $this->createForm(ResgisterType::class, $User);
    $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $User->setRoles(['ROLE_USER']);
            $entityManager = $doctrine->getManager();
            $User->setPassword(
                $userPasswordEncoder->encodePassword(
                        $User,
                        $form->get('Password')->getData()
                    )
                );       
            $entityManager->persist($User);
            $entityManager->flush();  
            $this->addFlash('success', 'Created! ');
            return $this->redirectToRoute('app_login');
        }
    return $this->render('security/signup.html.twig', [
        'form' => $form->createView(),
        'Email' => $User,

    ]);
    }
    /**
     * @Route("/login", name="app_login")
     */
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

    /**
     * @Route("/logout", name="app_logout")
     */
    public function logout(): void
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }
}
