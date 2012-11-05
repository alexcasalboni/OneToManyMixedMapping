<?php

namespace AlexCasalboni\OneToManyMixedMappingBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

use AlexCasalboni\OneToManyMixedMappingBundle\Document\Person;

/**
 * 
 * @MongoDB\Document(
 * 		collection="Car"
 * )
 * 
**/
class Car {

	/**
	 * @MongoDB\Id
	 *
	 */
	protected $id;
	
	/**
	 * @MongoDB\String
	 * 
	 */
	protected $brand;
	
	/**
	 * @MongoDB\Int
	 * 
	 */
	protected $weight;
	
	/**
	 * @MongoDB\ReferenceOne(
	 * 		targetDocument="Person",
	 * 		simple=true,
	 * 		inversedBy="items",
	 * 		cascade={"persist", "remove", "refresh", "merge"}
	 * )
	 */
	protected $owner;

    /**
     * Get id
     *
     * @return id $id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set brand
     *
     * @param string $brand
     * @return Car
     */
    public function setBrand($brand)
    {
        $this->brand = $brand;
        return $this;
    }

    /**
     * Get brand
     *
     * @return string $brand
     */
    public function getBrand()
    {
        return $this->brand;
    }

    /**
     * Set weight
     *
     * @param int $weight
     * @return Car
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;
        return $this;
    }

    /**
     * Get weight
     *
     * @return int $weight
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * Set owner
     *
     * @param AlexCasalboniOneToManyMixedMappingBundle\Document\Person $owner
     * @return Car
     */
    public function setOwner(Person $owner)
    {
    	if($this->owner){
    		$this->owner->removeItems($this);
    	}
    	$owner->addItems($this);
        $this->owner = $owner;
        return $this;
    }

    /**
     * Get owner
     *
     * @return AlexCasalboniOneToManyMixedMappingBundle\Document\Person $owner
     */
    public function getOwner()
    {
        return $this->owner;
    }
}
