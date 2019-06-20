<?php

namespace App\Repository;
use Doctrine\ORM\EntityRepository;

class JobRepository extends EntityRepository
{
    public function getAllUnfinishedJobs($finishedJobs)
    {
        $qb = $this->createQueryBuilder('q');
        $qb->from('App\Entity\Job', 'd')
            ->where('d.job_id', '!=', $finishedJobs);
        return $qb->getQuery()->getResult();
    }
}
