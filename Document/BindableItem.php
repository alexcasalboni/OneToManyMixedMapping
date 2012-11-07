<?php

namespace AlexCasalboni\OneToManyMixedMappingBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * Abstract Bindable Item
 *
 * @MongoDB\MappedSuperclass()
 * @MongoDB\ChangeTrackingPolicy("DEFERRED_IMPLICIT")
 * 
 * 
 */

abstract class BindableItem implements IBindableItem {

	/**
	 * @MongoDB\ReferenceOne(
	 * 		simple=true, 
	 * 		inversedBy="items",
	 * 		targetDocument="Person",
	 * 		cascade={"persist", "remove", "refresh", "merge", "save"}
	 * )
	 */
	protected $owner;
	
	
	
	/**
	 * Get owner
	 *
	 * @return Person $owner
	 */
	public function getOwner() {
		return $this->owner;
	}
	
	
	/**
	 * Set category
	 *
	 * @param Person $category
	 * @return BindableItem
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
