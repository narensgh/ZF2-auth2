<?php

namespace Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PmProject
 *
 * @ORM\Table(name="pm_project", indexes={@ORM\Index(name="asset_id", columns={"asset_id"})})
 * @ORM\Entity
 */
class PmProject
{
    /**
     * @var integer
     *
     * @ORM\Column(name="project_id", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $projectId;

    /**
     * @var string
     *
     * @ORM\Column(name="project_name", type="string", length=255, precision=0, scale=0, nullable=false, unique=false)
     */
    private $projectName;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_added", type="datetime", precision=0, scale=0, nullable=false, unique=false)
     */
    private $dateAdded;

    /**
     * @var \Entity\Asset
     *
     * @ORM\ManyToOne(targetEntity="Entity\Asset")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="asset_id", referencedColumnName="asset_id", nullable=true)
     * })
     */
    private $asset;


    /**
     * Get projectId
     *
     * @return integer 
     */
    public function getProjectId()
    {
        return $this->projectId;
    }

    /**
     * Set projectName
     *
     * @param string $projectName
     * @return PmProject
     */
    public function setProjectName($projectName)
    {
        $this->projectName = $projectName;

        return $this;
    }

    /**
     * Get projectName
     *
     * @return string 
     */
    public function getProjectName()
    {
        return $this->projectName;
    }

    /**
     * Set dateAdded
     *
     * @param \DateTime $dateAdded
     * @return PmProject
     */
    public function setDateAdded($dateAdded)
    {
        $this->dateAdded = $dateAdded;

        return $this;
    }

    /**
     * Get dateAdded
     *
     * @return \DateTime 
     */
    public function getDateAdded()
    {
        return $this->dateAdded;
    }

    /**
     * Set asset
     *
     * @param \Entity\Asset $asset
     * @return PmProject
     */
    public function setAsset(\Entity\Asset $asset = null)
    {
        $this->asset = $asset;

        return $this;
    }

    /**
     * Get asset
     *
     * @return \Entity\Asset 
     */
    public function getAsset()
    {
        return $this->asset;
    }
}
