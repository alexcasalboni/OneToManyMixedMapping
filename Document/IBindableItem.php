<?php

namespace AlexCasalboni\OneToManyMixedMappingBundle\Document;

interface IBindableItem{
	
	public function getOwner();
	public function setOwner(Person $owner);
	
	
}