<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\ Entity(repositoryClass = "App\Repository\JobRepository")
 */
class Job
{
    /**
     * @var int
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @ORM\Column(type="integer")
     *
     */
    protected $id;
    /**
     * Job number
     * @var string
     * @ORM\Column(type="string", length=255)
     */
    protected $job_id;
    /**
     * Job number
     * @var string
     * @ORM\Column(type="string", length=255)
     */
    protected $job_name;
    /**
     * Job number
     * @var string
     *
     * @ORM\Column(type="string", length=255)
     */
    protected $job_quantity;

    /**
     * @return string
     */
    public function getJobId(): string
    {
        return $this->job_id;
    }
    /**
     * @param string $jobId
     * @return Job
     */
    public function setJobId(string $jobId): Job
    {
        $this->job_id = $jobId;
        return $this;
    }
    /**
     * @return string
     */
    public function getJobName(): string
    {
        return $this->job_name;
    }
    /**
     * @param string $job_name
     * @return Job
     */
    public function setJobName(string $job_name): Job
    {
        $this->job_name = $job_name;
        return $this;
    }
    /**
     * @return string
     */
    public function getJobQuality(): string
    {
        return $this->job_quantity;
    }
    /**
     * @param string $jobQuantity
     * @return Job
     */
    public function setJobQuality(string $jobQuantity): Job
    {
        $this->job_quantity = $jobQuantity;
        return $this;
    }
}