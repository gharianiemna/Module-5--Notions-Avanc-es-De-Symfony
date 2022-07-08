<?php

namespace App\Controller;
use App\Entity\Category;
use App\Entity\Produit;
use App\Form\ProduitType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Persistence\ManagerRegistry;



class ProductController extends AbstractController
{
    /**
     * @Route("/product", name="app_product")
     */
    public function index(): Response
    {
        return $this->render('product/index.html.twig', [
            'controller_name' => 'ProductController',
        ]);
    }

     /**
     * @Route("/test", name="test")
     */ 
    public function newform(Request $request, ManagerRegistry $doctrine): Response
    {  
        $Produit =new Produit();
        $Category = new Category();
        $form = $this->createForm(ProduitType::class, $Produit);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {   
            $Category->addProduct($Produit);
            $Produit->setCategory($Category);
            $entityManager = $doctrine->getManager();
            $entityManager->persist($Produit);
            $entityManager->persist($Category);
            $entityManager->flush();
            return $this->redirectToRoute('app_product');
}
    return $this->render('product/test.html.twig', [
        'form' => $form->createView(),
    ]);
    }
}
