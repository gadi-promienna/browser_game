<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;
use AppBundle\Entity\Food;

/**
 * FoodRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class FoodRepository extends EntityRepository
{
	    /**
     * Save entity.
     *
     * @param Food $food Food entity
     */
    public function save(Food $food)
    {
        $this->_em->persist($food);
        $this->_em->flush();
    }

    /**
     * Delete entity.
     *
     * @param Food $food Food entity
     */
    public function delete(Food $food)
    {
        $this->_em->remove($food);
        $this->_em->flush();
    }
}
