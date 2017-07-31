<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of LoadCategorieBurger
 *
 * @author hugues
 */


namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Categorie;


class LoadCategorieBurger implements FixtureInterface {

    public function load(ObjectManager $manager) {
        
         $names = array(
      'burger steak',
      'burger chicken',
      'burger vegetable',
      'burger fish'
    );
         
         foreach ($names as $name) {
      $categorie = new Categorie();
      $categorie->setName($name);
      
       $manager->persist($categorie);

    }
    
    $manager->flush();
}
}