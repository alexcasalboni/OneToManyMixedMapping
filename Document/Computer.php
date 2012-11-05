<?php

namespace AlexCasalboni\OneToManyMixedMappingBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

use AlexCasalboni\OneToManyMixedMappingBundle\Document\Person;

/**
 * 
 * @MongoDB\Document(
 * 		collection="Computer"
 * )
 * 
**/
class Computer {

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
	protected $ram;
	
	/**
	 * @MongoDB\Int
	 * 
	 */
	protected $nCPU;
	
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
     * @return Computer
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
     * Set ram
     *
     * @param int $ram
     * @return Computer
     */
    public function setRam($ram)
    {
        $this->ram = $ram;
        return $this;
    }

    /**
     * Get ram
     *
     * @return int $ram
     */
    public function getRam()
    {
        return $this->ram;
    }

    /**
     * Set nCPU
     *
     * @param int $nCPU
     * @return Computer
     */
    public function setNCPU($nCPU)
    {
        $this->nCPU = $nCPU;
        return $this;
    }

    /**
     * Get nCPU
     *
     * @return int $nCPU
     */
    public function getNCPU()
    {
        return $this->nCPU;
    }

    /**
     * Set owner
     *
     * @param AlexCasalboniOneToManyMixedMappingBundle\Document\Person $owner
     * @return Computer
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
