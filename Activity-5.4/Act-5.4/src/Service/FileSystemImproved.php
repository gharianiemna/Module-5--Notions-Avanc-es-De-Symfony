<?php


namespace App\Service;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Finder\Finder;
use Symfony\Component\HttpFoundation\JsonResponse;

class FileSystemImproved
{
    private $finder;
    private $filesystem;


    public function __construct(){
        $this->finder = new Finder();
        $this->filesystem = new Filesystem();

    }
    public function getState(){
        //  $files=[];
        $this->finder->in(dirname(getcwd()))->path('fsi');
        foreach ($this->finder as $file) {
            $path = $file->getPath() . '\\';
        }

        $resultat = $this->finder->files()->in($path);
        foreach ($resultat as $file) {
            $files[] = $file->getFilename();
        }
        return $files;
    }


     public function createFile($filename){

        $this->filesystem->touch("C:\\formation talan php\Module-5 -Notions Avancées De Symfony\Activity-5.4\Act-5.4\\vendor\symfony\http-client-contracts\Test\Fixtures\web\\fsi\\".$filename.".txt");
        $this->finder->in(dirname(getcwd()))->path('fsi');
        foreach ($this->finder as $file) {
            $path = $file->getPath().'\\';
        }

        $resultat = $this->finder->files()->in($path);
        foreach ($resultat as $file) {
            $files[] = $file->getFilename();
        }
        return $files;
    }

    public function deleteFile($filename)
    {
        $files = $this->finder->in(dirname(getcwd()))->path($filename.'.txt');
        if (!$files->hasResults()) {
            return false;
        }

        foreach ($files as $file) {
            $path = $file->getRealPath();
        }

        $this->filesystem->remove($path);
        return true;
    }

    public function writeInFile($filename, $text, $offset = 0)
    {
        $files = $this->finder->in(dirname(getcwd()))->path($filename.'.txt');
        if (!$files->hasResults()) {
            return false;
        }
        foreach ($files as $file) {
            $path = $file->getRealPath();
        }
        $file = fopen($path,'a+');
        fseek($file,$offset);
        fwrite($file,$text);
        fclose($file);
        return true;
    }

    public function readFile($filename)
    {
        $this->finder->directories()->in('../..')->name('fsi');
        foreach ($this->finder as $f) {
            $contents = $f->getRealPath();
        }

        $src_dir_path = $contents . '/' . $filename;
        $file = fopen($src_dir_path, 'r+');
        $res = fread($file, filesize($src_dir_path));
        return $res;
    }

}