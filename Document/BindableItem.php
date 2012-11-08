<?php

namespace AlexCasalboni\OneToManyMixedMappingBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;


abstract class BindableItem implements IBindableItem {

	/**
	 * @MongoDB\ReferenceOne(
	 * 		simple=true, 
	 * 		targetDocument="Person",
	 * 		cascade={"persist", "remove", "refresh", "merge"}
	 * )
	 * 
	 * @var Person
	 * 
	 */
	protected $owner;
	
	
	
	/**
	 * (non-PHPdoc)
	 * @see AlexCasalboni\OneToManyMixedMappingBundle\Document.IBindableItem::getOwner()
	 */
	public function getOwner() {
		return $this->owner;
	}
	
	/**
	 * (non-PHPdoc)
	 * @see AlexCasalboni\OneToManyMixedMappingBundle\Document.IBindableItem::setOwner()
	 */
	public function setOwner(Person $owner) {
		if($this->getOwner()){
			$this->getOwner()->removeItems($this);
		}
		$owner->addItems($this);
		  
		$this->owner = $owner;
		return $this;
	}

}
