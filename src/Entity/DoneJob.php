<?php


namespace App\Entity;

use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
/**
 * @ORM\ Entity(repositoryClass = "App\Repository\DoneJobRepository")
 */
class DoneJob
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
     * @var string
     * @ORM\Column(type="string", length=255)
     */
    protected $job_id;
    /**
     * @var string
     * @ORM\Column(type="string", length=255)
     */
    protected $job_name;
    /**
     * @var string
     * @ORM\Column(type="string", length=255)
     */
    protected $road_section;
    /**
     * @var float
     * @ORM\Column(type="float")
     */
    protected $road_section_begin;
    /**
     * @var float
     * @ORM\Column(type="float")
     */
    protected $road_section_end;
    /**
     * @var string
     * @ORM\Column(type="string", length=255)
     */
    protected $unit_of;
    /**
     * @var float
     * @ORM\Column(type="float")
     */
    protected $quantity;
    /**
     * @var string
     * @ORM\Column(type="string", length=255)
     */
    protected $done_job_date;
    /**
     * @var string
     * @ORM\Column(type="string", length=255)
     */
    protected $note = '';
    /**
     * @var integer
     * @ORM\Column(type="integer")
     */
    protected $section_id;
    /**
     * @var string
     * @ORM\Column(type="integer")
     */
    protected $road_level;
    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return DoneJob
     */
    public function setId(int $id): DoneJob
    {
        $this->id = $id;
    }

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
    public function setJobId(string $jobId): DoneJob
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
     * @param string
     * @return DoneJob
     */
    public function setJobName(string $job_name): DoneJob
    {
        $this->job_name = $job_name;
        return $this;
    }

    /**
     * @return string
     */
    public function getRoadSection(): string
    {
        return $this->road_section;
    }

    /**
     * @param string $road_section
     * @return DoneJob
     */
    public function setRoadSection(string $road_section): DoneJob
    {
        $this->road_section = $road_section;
        return $this;
    }

    /**
     * @return float
     */
    public function getRoadSectionBegin(): float
    {
        return $this->road_section_begin;
    }

    /**
     * @param float $road_section_begin
     * @return DoneJob
     */
    public function setRoadSectionBegin(float $road_section_begin): DoneJob
    {
        $this->road_section_begin = $road_section_begin;
        return $this;
    }

    /**
     * @return float
     */
    public function getRoadSectionEnd(): float
    {
        return $this->road_section_end;
    }

    /**
     * @param float $road_section_end
     * @return DoneJob
     */
    public function setRoadSectionEnd(float $road_section_end): DoneJob
    {
        $this->road_section_end = $road_section_end;
        return $this;
    }

    /**
     * @return string
     */
    public function getUnitOf(): string
    {
        return $this->unit_of;
    }

    /**
     * @param string $unit_of
     * @return DoneJob
     */
    public function setUnitOf(string $unit_of): DoneJob
    {
        $this->unit_of = $unit_of;
        return $this;
    }

    /**
     * @return float
     */
    public function getQuantity(): float
    {
        return $this->quantity;
    }

    /**
     * @param float $quantity
     * @return DoneJob
     */
    public function setQuantity(float $quantity): DoneJob
    {
        $this->quantity = $quantity;
        return $this;
    }

    /**
     * @return datetime
     */
    public function getDoneJobDate(): datetime
    {
        return $this->done_job_date;
    }

    /**
     * @param string $done_job_date
     * @return DoneJob
     */
    public function setDoneJobDate(string $done_job_date): DoneJob
    {
        $this->done_job_date = $done_job_date;
        return $this;
    }

    /**
     * @return string
     */
    public function getNote(): string
    {
        return $this->note;
    }

    /**
     * @param string $note
     * @return DoneJob
     */
    public function setNote(string $note): DoneJob
    {
        $this->note = $note;
        return $this;
    }

    /**
     * @return int
     */
    public function getSectionId(): int
    {
        return $this->section_id;
    }

    /**
     * @param int $section_id
     * @return DoneJob
     */
    public function setSectionId(int $section_id): DoneJob
    {
        $this->section_id = $section_id;
        return $this;
    }

    /**
     * @return string
     */
    public function getRoadLevel(): string
    {
        return $this->road_level;
    }

    /**
     * @param string $road_level
     * @return DoneJob
     */
    public function setRoadLevel(string $road_level): DoneJob
    {
        $this->road_level = $road_level;
        return $this;
    }
}