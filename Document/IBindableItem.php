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
interface IBindableItem{
	
	/**
	 * Get owner
	 *
	 * @return Person $owner
	 */
	public function getOwner();
	
	/**
	 * Set category
	 *
	 * @param Person $category
	 * @return IBindableItem
	 */
	public function setOwner(Person $owner);
	
	
}