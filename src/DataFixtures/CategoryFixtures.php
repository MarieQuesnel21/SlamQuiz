<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);

          

        $category = new Category();
        $category->setShortname('POO');
        $category->setLongname('Programmation Orientée Objet');
        $manager->persist($category);

        // PHP
        $category = new Category();
        $category->setShortname('PHP');
        $category->setLongname('Langage PHP');
        $manager->persist($category);

        // Symfony 4
        $category = new Category();
        $category->setShortname('Symf4');
        $category->setLongname('Symfony version 4');
        $manager->persist($category);

        
        $category = new Category();
        $category->setShortname('Math');
        $category->setLongname('Mathématique');
        $manager->persist($category);


        $manager->flush();    
    }
}
