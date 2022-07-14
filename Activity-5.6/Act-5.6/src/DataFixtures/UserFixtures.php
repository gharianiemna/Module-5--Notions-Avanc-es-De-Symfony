<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\User;

class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
    for ($i=1; $i<=50; $i++){  $user =new User();
        $user->setUserName("user name $i")
             ->setEmail("$i@talan")
             ->setAdress("Addresse $i")
             ->setAge($i)
             ->setRoles(["ROLE_USER"])
             ->setPassword(
                "a123$i");
        $manager->persist($user);
    }  
        $manager->flush();
    }

    public function getDependencies()
    {
        return array(
            UserFixtures::class,
        );
    }
}