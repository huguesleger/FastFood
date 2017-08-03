<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Icon;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * Description of LoadIcon
 *
 * @author hugues
 */
class LoadIcon implements FixtureInterface {

    public function load(ObjectManager $manager) {
        
       $noms = array(
           'aubergine',
           'beer-1',
           'beer-2',
           'beer',
           'birthday-cake',
           'biscuit-1',
           'biscuit',
           'bread',
           'breakfast',
           'brochettes',
           'burger-1',
           'burger',
           'carrot',
           'cheese',
           'chicken-1',
           'chicken',
           'chocolate-1',
           'chocolate-2',
           'chocolate',
           'cocktail-1',
           'cocktail',
           'coffee-1',
           'coffee-2',
           'coffee',
           'coke',
           'covering',
           'croissant',
           'cup',
           'cupcake',
           'donut-1',
           'donut',
           'egg',
           'fish',
           'fries',
           'honey',
           'hot-dog-1',
           'hot-dog',
           'icecream-1',
           'icecream',
           'jam',
           'jelly',
           'juice',
           'ketchup',
           'lemon',
           'lettuce',
           'loaf',
           'milk',
           'noodles',
           'pepper',
           'pickles',
           'pie',
           'pizza',
           'rice',
           'sausage',
           'spaguetti',
           'steak',
           'tea',
           'water-glass',
           'watermelon',
           'wine-1',
           'wine-2',
           'wine'
           
    );
         
         foreach ($noms as $nom) {
      $icon = new Icon();
      $icon->setNom($nom);
      
       $manager->persist($icon);

    }
    
    $manager->flush();
    }
}
