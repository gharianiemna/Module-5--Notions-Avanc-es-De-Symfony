<?php

namespace App\tests\Service;
use App\Service\FileSystemImproved;
use PHPUnit\Framework\TestCase;


class FileSystemImprovedTest extends TestCase
{
   public function testgetState (){
      $file= new FileSystemImproved();
      $this->assertSame(["file1.txt","file2.txt", "file3.txt"], $file->getState());
   }

   public function testcreateFile (){
      $file= new FileSystemImproved();
      $this->assertSame(["file1.txt","file2.txt", "file3.txt", "filetest.txt"], $file->createFile('filetest'));
   }  

   public function testdeleteFile (){
      $file= new FileSystemImproved();
      $this->assertTrue($file->deleteFile('filetest'));
   }

       public function testWriteInFile(){
        $file = new FileSystemImproved();
        $this->assertTrue($file->writeInFile('file1', 'text'));
    }
        public function testReadFile(){
        $file = new FileSystemImproved();
        $this->assertNotFalse($file->readFile('file1'));
    }
 
    public function testWriteNoFile(){
        $file = new FileSystemImproved();
        $this->assertSame(false,$file->writeInFile('filetest2','text'));
    }
 
    public function testReadNoFile(){
        $file = new FileSystemImproved();
        $this->assertFalse($file->readFile('filetest2'));
    }
}