<?php

namespace UJM\ExoBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * InteractionOpenRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class InteractionOpenRepository extends EntityRepository
{

    /**
     * Get InteractionOpen linked with an interaction
     *
     * @access public
     *
     * @param integer $interactionId id Interaction
     *
     * Return array[InteractionOpen]
     */
    public function getInteractionOpen($interactionId)
    {
        $qb = $this->createQueryBuilder('iopen');
        $qb->join('iopen.interaction', 'i')
            ->where($qb->expr()->in('i.id', $interactionId));

        return $qb->getQuery()->getResult();
    }
}