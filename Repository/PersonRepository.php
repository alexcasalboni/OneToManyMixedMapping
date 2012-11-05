<?php

namespace AlexCasalboni\OneToManyMixedMappingBundle\Repository;

use Doctrine\ODM\MongoDB\DocumentRepository;

use WeTalkGroup\Bundle\WtmsNetworkBundle\Document\Network;

/**
 * TaxonomyRepository
 * @return Doctrine\ODM\MongoDB\Query
 */
class PersonRepository extends DocumentRepository
{
	
	public function findPersonByName($name)
	{
		return $this->createQueryBuilder()
			->find()
			->limit(1)
			//->exclude('items')
			->field('name')
			->equals($name)
			->getQuery()->execute()
			->getSingleResult();
	}
	
	
}