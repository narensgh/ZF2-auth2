<?php

namespace Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Asset
 *
 * @ORM\Table(name="asset", indexes={@ORM\Index(name="asset_type_id", columns={"asset_type_id"})})
 * @ORM\Entity
 */
class Asset
{
    /**
     * @var integer
     *
     * @ORM\Column(name="asset_id", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $assetId;

    /**
     * @var string
     *
     * @ORM\Column(name="filename", type="string", length=255, precision=0, scale=0, nullable=false, unique=false)
     */
    private $filename;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_added", type="datetime", precision=0, scale=0, nullable=false, unique=false)
     */
    private $dateAdded;

    /**
     * @var \Entity\AssetType
     *
     * @ORM\ManyToOne(targetEntity="Entity\AssetType")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="asset_type_id", referencedColumnName="asset_type_id", nullable=true)
     * })
     */
    private $assetType;


    /**
     * Get assetId
     *
     * @return integer 
     */
    public function getAssetId()
    {
        return $this->assetId;
    }

    /**
     * Set filename
     *
     * @param string $filename
     * @return Asset
     */
    public function setFilename($filename)
    {
        $this->filename = $filename;

        return $this;
    }

    /**
     * Get filename
     *
     * @return string 
     */
    public function getFilename()
    {
        return $this->filename;
    }

    /**
     * Set dateAdded
     *
     * @param \DateTime $dateAdded
     * @return Asset
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
     * Set assetType
     *
     * @param \Entity\AssetType $assetType
     * @return Asset
     */
    public function setAssetType(\Entity\AssetType $assetType = null)
    {
        $this->assetType = $assetType;

        return $this;
    }

    /**
     * Get assetType
     *
     * @return \Entity\AssetType 
     */
    public function getAssetType()
    {
        return $this->assetType;
    }
}
