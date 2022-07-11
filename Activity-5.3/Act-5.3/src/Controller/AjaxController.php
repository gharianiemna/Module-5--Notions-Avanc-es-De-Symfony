<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;


class AjaxController extends AbstractController
{
    /**
     * @Route("/ajax", name="app_ajax")
     */
    public function index( Request $request): Response
    {
     
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        $user = $this->getUser();
        if ($request->isXmlHttpRequest() || $request->query->get('showJson') == 1) {
            $jsonData = array();
            $temp = array(
                    'name' => $user->getFullName(),
                    'Email' => $user->getEmail(),
                );
                $jsonData[] = $temp; 
            
            return new JsonResponse($jsonData);
        } else {
            return $this->render('ajax/index.html.twig');
        } 

        // if(!$user)return $this->json([
        //     'code'=>403,
        //     'message'=>"access denied"
        // ], 403);
        // if($user){
        //     $data= $userRepository->findOneBy(
        //         ['user'=>$user]
        //     );
        //     return $this->json([
        //         'code' => 200,
        //         'message' => "here's your data"
        //     ], 200);
        // }
        
    
    }
}
