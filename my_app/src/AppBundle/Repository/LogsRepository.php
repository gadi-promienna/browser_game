<?php

/**
 * Logs repository
 */ 

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;
use AppBundle\Entity\Logs;

/**
 * Class LogsRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class LogsRepository extends EntityRepository
{
    /**
  * Save log.
  *
  * @param string $event
  */

    public function make_log($event)
    {
        $date = date_create('now');
        $log = new Logs();
         $log->setDate($date);
         $log->setEvent($event);
        $em = $this ->getEntityManager();
        $em->persist($log);
        $em->flush();

    }


        /**
     * Save entity.
     *
     * @param Logs $log Logs entity
     */
    public function save(Logs $log)
    {
        $this->_em->persist($log);
        $this->_em->flush();
    }

    /**
     * Delete entity.
     *
     * @param Logs $log Logs entity
     */
    public function delete(Logs $log)
    {
        $this->_em->remove($log);
        $this->_em->flush();
    }


}
