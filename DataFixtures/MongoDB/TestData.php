<?php

namespace AlexCasalboni\OneToManyMixedMappingBundle\DataFixtures\MongoDB;

use AlexCasalboni\OneToManyMixedMappingBundle\Document\Car;

use AlexCasalboni\OneToManyMixedMappingBundle\Document\Computer;

use AlexCasalboni\OneToManyMixedMappingBundle\Document\Person;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

use WeTalkGroup\Bundle\WtmsTaxonomyBundle\Document\Category;

class LoadTestData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
    	
    	$person = new Person("Alex");
    	 
    	$computer = new Computer();
    	$computer
    		->setBrand("Acer")
    		->setNCPU(2)
    		->setRam(4)
    		->setOwner($person);
    	 
    	$car = new Car();
    	$car
    		->setBrand("Ford")
    		->setWeight(3000)
    		->setOwner($person);
    	
    	$person2 = new Person("John");
    	
    	$computer2 = new Computer();
    	$computer2
    	->setBrand("Vaio")
    		->setNCPU(2)
    		->setRam(2)
    		->setOwner($person2);
    	 
    	$manager->persist($person);
    	$manager->persist($person2);
    	 
    	$manager->flush();
    	   	
}

    public function getOrder()
    {
        return 1; // the order in which fixtures will be loaded
    }
}