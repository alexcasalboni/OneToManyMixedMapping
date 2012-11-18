<?php

namespace AlexCasalboni\OneToManyMixedMappingBundle\Controller;

use Doctrine\ODM\MongoDB\DocumentManager;

use Doctrine\ODM\MongoDB\DocumentRepository;

use AlexCasalboni\OneToManyMixedMappingBundle\Document\Person;
use AlexCasalboni\OneToManyMixedMappingBundle\Document\Car;
use AlexCasalboni\OneToManyMixedMappingBundle\Document\Computer;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{
	
	/**
	 * Return Document Manager;
	 * @return DocumentManager
	 */
	protected function getDocumentManager(){
		return $this->get('doctrine_mongodb.odm.document_manager');
	}
	/**
	 * Return repository for the specified document (default: Category)
	 * @param string $document
	 * @return DocumentRepository
	 */
	protected function getRepository($document, $bundle = 'AlexCasalboniOneToManyMixedMappingBundle'){
		return $this->getDocumentManager()->getRepository("$bundle:$document");
	}
    
    /**
     * @Route("/")
     */
    public function checkAction()
    {
    	
    	$person = $this->getRepository("Person")
    				->findPersonByName('Alex');
    	
    	$person2 = $this->getRepository("Person")
    				->findPersonByName('John');
    	
    	if(!$person)
    		return $this->createNotFoundException("Alex was not found!");
    	if(!$person2)
    		return $this->createNotFoundException("John was not found!");
    	 
    	echo "<h1>Initial Data</h1>";
    	$this->printPerson($person);
    	$this->printPerson($person2);
    	
    	$dm = $this->getDocumentManager();
    	
    	$item = $person2->getItems()->get(0);
    	$item->setOwner($person);
    	
    	$dm->persist($item);
    	
    	
    	//$dm->persist($person);
    	//$dm->persist($person2); //without this, person2 is not updated!
    	
    	//$dm->flush($item);
    	//$dm->flush($person);
    	$dm->flush();
    	
    	echo "<h1>After edit</h1>";
    	$this->printPerson($person);
    	$this->printPerson($person2);
    	
    	die("finished");
    }
    
    
    private function printPerson(Person $p){
    	echo "<h2>{$p->getName()}</h2>";
    	 
    	echo implode("<br/>", array(
    			"Person id: {$p->getId()}",
    			"name: {$p->getName()}",
    			"# items: {$p->getItems()->count()}",
    			""
    			));
    	
    	foreach($p->getItems() as $item){
    		echo implode("<br/>", array(
    				"Item id: {$item->getId()}",
    				"brand: {$item->getBrand()}",
    				($item instanceof Computer)?
    				"nCPU: {$item->getNCPU()}"
    				:
    		"weight: {$item->getWeight()}"
    		,
    		""
    		));
    	}
    	 
    	echo "serialized person: <br/>";
    	$serializer = $this->container->get('serializer');
    	 
    	$data = $serializer->serialize($p, 'json');
    	
    	echo $data;
    }
    
}
