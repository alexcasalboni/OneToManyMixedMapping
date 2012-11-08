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
class Car extends BindableItem {

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
	 * @MongoDB\PreUpdate
	 * @MongoDB\PrePersist
	 */
	public function preSave(){
		echo "<br/>\nsaving Car: {$this->getId()} <br/>\n";
	}
	
	
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

}
