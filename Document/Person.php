<?php

namespace AlexCasalboni\OneToManyMixedMappingBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

use JMS\SerializerBundle\Annotation\ExclusionPolicy;

/**
 * 
 * @MongoDB\Document(
 * 		collection="Person",
 * 		repositoryClass="AlexCasalboni\OneToManyMixedMappingBundle\Repository\PersonRepository"
 * )
 * 
 * @MongoDB\ChangeTrackingPolicy("DEFERRED_EXPLICIT")
 * 
 * @ExclusionPolicy("none")
 * 
**/
class Person {

	/**
	 * @MongoDB\Id
	 *
	 */
	protected $id;
	
	/**
	 * @MongoDB\String
	 * 
	 */
	protected $name;
	
	/**
	 * @MongoDB\ReferenceMany(
	 *   discriminatorMap={
	 *     "car"="Car",
	 *     "pc"="Computer"
	 *   },
	 *   cascade={"persist", "remove", "refresh", "merge"}
	 * )
	 * 
	 */
	protected $items;
	
	/**
	 * @MongoDB\Timestamp
	 * 
	 */
	protected $updatedTime;
	
    public function __construct($name)
    {
    	$this->setName($name);
        $this->items = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * @MongoDB\PreUpdate
     * @MongoDB\PrePersist
     */
    public function preSave(){
    	
    	echo "calling preSave() on person " . ($this->getId()?$this->getId():"NEW") . "<br/>\n";
    	
    	$this->updateTime();
    	
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
     * Set name
     *
     * @param string $name
     * @return Person
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Get name
     *
     * @return string $name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Add items
     *
     * @param $items
     */
    public function addItems($items)
    {
    	if(!$this->items->contains($items)){
    		$this->items->add($items);
    	}
    }
    
    /**
     * Add items
     *
     * @param $items
     */
    public function removeItems($items)
    {
    	if($this->items->contains($items)){
    		$this->items->removeElement($items);
    		$this->updateTime();
    	}
    }

    /**
     * Get items
     *
     * @return Doctrine\Common\Collections\Collection $items
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * Set updatedTime
     *
     * @param timestamp $updatedTime
     * @return Person
     */
    public function setUpdatedTime($updatedTime)
    {
        $this->updatedTime = $updatedTime;
        return $this;
    }

    /**
     * Get updatedTime
     *
     * @return timestamp $updatedTime
     */
    public function getUpdatedTime()
    {
        return $this->updatedTime;
    }
    
    
    public function updateTime(){
    	$this->setUpdatedTime(time());
    }
    
}
