<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;
use Omines\DataTablesBundle\Adapter\ArrayAdapter;
use Omines\DataTablesBundle\Column\TextColumn;
use Omines\DataTablesBundle\DataTableFactory;
use Symfony\Component\HttpFoundation\Request;
use Omines\DataTablesBundle\Adapter\Doctrine\ORMAdapter;
use App\Form\ResgisterType;
use Omines\DataTablesBundle\Adapter\Doctrine\ORM\SearchCriteriaProvider;
use Doctrine\Persistence\ManagerRegistry;
use App\Validator\ApiValidator;

class ProfileController extends AbstractController
{
    


    // /**
    //  * @Route("/admin", name="admin")
    //  */
    // public function adminProfil(Request $request, ManagerRegistry $doctrine, DataTableFactory $dataTableFactory)
    // {       
    //     $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
    //     $table = $dataTableFactory->create()
    //              ->add('userName', TextColumn::class, ['label' => ' User name', 'className' => 'bold'])
    //             ->add('Age', TextColumn::class, ['label' => ' User Age', 'className' => 'bold'])
    //              ->add('Adress', TextColumn::class, ['label' => ' User Addresse', 'className' => 'bold'])
    //               ->add('Email', TextColumn::class, ['label' => ' User Email', 'className' => 'bold'])
    //             ->createAdapter(ORMAdapter::class, [
    //              'entity' => User::class,
  
    //             ])
                
    //         ->handleRequest($request);

    //     if ($table->isCallback()) {
    //         return $table->getResponse();
    //     }    
    //     return $this->render('profile/admin.html.twig', ['datatable' => $table]);
    
    // }

 /**
     * @Route("/user", name="user")
     */
    public function user(): Response
    
    { 
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
      
        return $this->render('profile/user.html.twig', [
            'controller_name' => 'ProfileController',
         
        ]);
    }
   /**
 * @Route("/access-denied", name="app_access_denied")
 */
public function accessDenied()
{
    if ( $this->getUser() ) {
        return $this->redirectToRoute('user');
    }

    return $this->redirectToRoute('app_login');
}   
}
