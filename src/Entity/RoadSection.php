<?php
namespace App\Entity;
use PhpParser\Node\Expr\Cast\Double;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\ Entity(repositoryClass = "App\Repository\RoadSectionRepository")
 */
class RoadSection
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
     * RoadSection number
     * @var string
     *
     * @ORM\Column(type="string", length=255)
     */
    protected $section_id;
    /**
     * RoadSection number
     * @var string
     *
     * @ORM\Column(type="string", length=255)
     */
    protected $sectionName;
    /**
     * RoadSection number
     * @var int
     *
     * @ORM\Column(type="integer")
     */
    protected $unit_id;
    /**
     * RoadSection float
     * @var float
     *
     * @ORM\Column(type="float")
     */
    protected $section_begin;
    /**
     * RoadSection float
     * @var float
     *
     * @ORM\Column(type="float")
     */
    protected $section_end;
    /**
     * RoadSection number
     * @var int
     *
     * @ORM\Column(type="integer")
     */
    protected $level;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }
    /**
     * @param int $id
     * @return RoadSection
     */
    public function setId(int $id): RoadSection
    {
        $this->id = $id;
        return $this;
    }
    /**
     * @return string
     */
    public function getJobId(): string
    {
        return $this->section_id;
    }
    /**
     * @param string $sectionId
     * @return RoadSection
     */
    public function setSectionId(string $sectionId): RoadSection
    {
        $this->section_id = $sectionId;
        return $this;
    }
    /**
     * @return string
     */
    public function getSectionName(): string
    {
        return $this->section_id;
    }
    /**
     * @param string $sectionName
     * @return RoadSection
     */
    public function setSectionName(string $sectionName): RoadSection
    {
        $this->sectionName = $sectionName;
        return $this;
    }
    /**
     * @return int
     */
    public function getUnitId(): int
    {
        return $this->unit_id;
    }
    /**
     * @param int $unitId
     * @return RoadSection
     */
    public function setUnitId(int $unitId): RoadSection
    {
        $this->unit_id = $unitId;
        return $this;
    }
    /**
     * @return float
     */
    public function getSectionBegin(): float
    {
        return $this->section_begin;
    }
    /**
     * @param float $sectionBegin
     * @return RoadSection
     */
    public function setSectionBegin(float $sectionBegin): RoadSection
    {
        $this->section_begin = $sectionBegin;
        return $this;
    }
    /**
     * @return float
     */
    public function getSectionEnd(): float
    {
        return $this->section_end;
    }
    /**
     * @param float $sectionEnd
     * @return RoadSection
     */
    public function setSectionEnd(float $sectionEnd): RoadSection
    {
        $this->section_end = $sectionEnd;
        return $this;
    }
    /**
     * @return int
     */
    public function getLevel(): int
    {
        return $this->level;
    }
    /**
     * @param int $sectionLevel
     * @return RoadSection
     */
    public function setLevel(int $sectionLevel): RoadSection
    {
        $this->level = $sectionLevel;
        return $this;
    }
}