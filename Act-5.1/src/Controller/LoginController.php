<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\User;
use App\Form\ResgisterType;


class LoginController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(): Response
    {
        return $this->render('login/home.html.twig', [
            'controller_name' => 'LoginController',
        ]);
    }

        /**
     * @Route("/Register", name="Regsiter")
     */
    public function Email(Request $request, ManagerRegistry $doctrine): Response
     {
    $User = new User();
    $form = $this->createForm(ResgisterType::class, $User);
    $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $doctrine->getManager();
            $entityManager->persist($User);
            $entityManager->flush();  
            $this->addFlash('success', 'Created! ');
            return $this->redirectToRoute('home');
        }
    return $this->render('login/index.html.twig', [
        'form' => $form->createView(),
        'Email' => $User,

    ]);
    }
}
