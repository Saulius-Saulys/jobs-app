<?php

namespace App\Repository;
use Doctrine\ORM\EntityRepository;

class DoneJobRepository extends EntityRepository
{
    public function findJobsUnderMonthAndLinerType()
    {
        $qb = $this->createQueryBuilder('q');
        $qb
            ->from('App\Entity\DoneJob', 'd')
            ->where('d.unit_of like :unit_of')
            ->andWhere('d.done_job_date < :data')
            ->setParameter('unit_of','%m')
            ->setParameter('data', new \DateTime('-30 days'), \Doctrine\DBAL\Types\Type::DATETIME);
        return $qb->getQuery()->getResult();
    }
}
