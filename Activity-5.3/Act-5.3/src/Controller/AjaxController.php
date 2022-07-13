<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use App\Entity\User;
use App\Form\ResgisterType;


class AjaxController extends AbstractController
{
    /**
     * @Route("/ajax", name="app_ajax")
     */
    public function index( Request $request): Response
    {
     
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        $user = $this->getUser();
        return  $this->json(
            [
                    'name' => $user->getFullName(),
                    'email' => $user->getEmail(),
            ]);
             
        }

    /**
     * @Route("/ajax-index", name="ajax")
     */
    public function affiche(): Response
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        return $this->render('ajax/index.html.twig', [
            'controller_name' => 'AjaxController',
        ]);
    }

    /**
     * @Route("/ajax-index-all", name="allajax")
     */
    public function afficheAll(Request $request, ManagerRegistry $doctrine, UserPasswordEncoderInterface $userPasswordEncoder): Response
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
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
            return $this->redirectToRoute('ajax');
        }
        $repos = $this->getDoctrine()->getRepository(User::class);
        $users = $repos->findAll();
        $jsonData = array();
        $idx = 0;
        foreach ($users as $student) {
            $temp = array(
                'name' => $student->getUserName(),
                
            );
            $jsonData[$idx++] = $temp;
            
        } 
        return $this->render('ajax/indexall.html.twig', [
            'controller_name' => 'AjaxController',
            'form' => $form->createView(),

        ]);
    }
}

