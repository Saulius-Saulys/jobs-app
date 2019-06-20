<?php


namespace App\Controller;

use App\Entity\DoneJob;
use App\Entity\Job;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\QueryBuilder;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Doctrine\ORM\EntityRepository;

class JobController extends Controller
{
    protected $em;
    /**
     * OptionsService constructor.
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->em = $entityManager;
    }

    /**
     * @Route("/unfinished")
     */
    public function index(){

        $finishedJobs = $this->em->getRepository(DoneJob::class)->findJobsUnderMonthAndLinerType();
        $unfinishedJobs = $this->em->getRepository(Job::class)->getAllUnfinishedJobs($finishedJobs);
        $jobsLeftToDo = $this->quantityLeft($finishedJobs);
        return $this->render('jobs.html.twig', $jobsLeftToDo, $unfinishedJobs);
    }

    /**
     * @param $jobs
     * @return mixed
     */
    public function quantityLeft($jobs){
        $jobsleft = [];
        foreach ($jobs as $job){
            foreach ($jobsleft as $jobleft){
                if($jobleft == $job->job_id){
                    $roadleft = $job->road_section_begin - $job->road_section_end - $jobleft[$job->job_id];
                    $jobsleft[$job->job_id][$roadleft];
                }
            }
            $roadleft = $job->road_section_begin - $job->road_section_end;
            $jobsleft[$job->job_id][$roadleft];
        }
        return $jobleft;
    }
}