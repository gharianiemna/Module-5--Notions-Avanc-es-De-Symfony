<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Service\FileSystemImproved;


class ImprovedController extends AbstractController
{
      /**
     * @Route("/", name="home")
     */
    public function home(): Response
    {
        return $this->render('Improved/home.html.twig', [
            'controller_name' => 'ImprovedController',
        ]);
    }
    /**
     * @Route("/Improved", name="app_Improved")
     */
    public function index(): Response
    {
        return $this->render('Improved/index.html.twig', [
            'controller_name' => 'ImprovedController',
        ]);
    }

    
         /**
     * @Route("/create-file/{filename}", name="create_empty_file")
     */
    public function create_File(FileSystemImproved $fileSystemImproved, $filename): Response
   
    { $file= $fileSystemImproved->createFile($filename);
        // $this->addFlash('success', $file);
        return new JsonResponse($file);
    }
   

    /**
     * @Route("/write-in-file/{filename}/{text}", name="create_file_with_text")
     */
    public function write_InFile( FileSystemImproved $fileSystemImproved, $filename, $text ): Response
    {  
        $file= $fileSystemImproved-> writeInFile($filename, $text );
         return new JsonResponse(json_encode($file));
    }

           /**
     * @Route("/delete-file/{filename}", name="remove_text")
     */
    public function delete_File(FileSystemImproved $fileSystemImproved, $filename ): Response
    { 
        $file= $fileSystemImproved->deleteFile($filename);
        return new JsonResponse(json_encode($file));
    }

    /**
     * @Route("/state", name="state")
     */
    public function get_State(FileSystemImproved $fileSystemImproved): Response
    {
        $file = $fileSystemImproved->getState();
        return new JsonResponse($file);
    }
    /**
     * @Route("/read_file/{file_name}", name="read_file_fsi")
     */
    public function read_File(FileSystemImproved $fileSystemImproved, $file_name): Response
    {
        $res = $fileSystemImproved->readFile($file_name);
        return new JsonResponse($res);
    }

}
