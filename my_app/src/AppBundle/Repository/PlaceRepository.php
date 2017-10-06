<?php

/**
 * Place repository
 */

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;
use AppBundle\Entity\Place;

/**
 * Class PlaceRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class PlaceRepository extends EntityRepository
{



        /**
     * Save entity.
     *
     * @param Place $place Place entity
     */
    public function save(Place $place)
    {
        $this->_em->persist($place);
        $this->_em->flush();
    }

    /**
     * Delete entity.
     *
     * @param Place $place Place entity
     */
    public function delete(Place $place)
    {
        $this->_em->remove($place);
        $this->_em->flush();
    }
}
