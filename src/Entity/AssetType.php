<?php

namespace Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AssetType
 *
 * @ORM\Table(name="asset_type")
 * @ORM\Entity
 */
class AssetType
{
    /**
     * @var integer
     *
     * @ORM\Column(name="asset_type_id", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $assetTypeId;

    /**
     * @var string
     *
     * @ORM\Column(name="asset", type="string", length=50, precision=0, scale=0, nullable=false, unique=false)
     */
    private $asset;

    /**
     * @var string
     *
     * @ORM\Column(name="extension", type="string", length=25, precision=0, scale=0, nullable=false, unique=false)
     */
    private $extension;

    /**
     * @var string
     *
     * @ORM\Column(name="location", type="string", length=50, precision=0, scale=0, nullable=false, unique=false)
     */
    private $location;

    /**
     * @var string
     *
     * @ORM\Column(name="path", type="string", length=100, precision=0, scale=0, nullable=false, unique=false)
     */
    private $path;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255, precision=0, scale=0, nullable=false, unique=false)
     */
    private $description;


    /**
     * Get assetTypeId
     *
     * @return integer 
     */
    public function getAssetTypeId()
    {
        return $this->assetTypeId;
    }

    /**
     * Set asset
     *
     * @param string $asset
     * @return AssetType
     */
    public function setAsset($asset)
    {
        $this->asset = $asset;

        return $this;
    }

    /**
     * Get asset
     *
     * @return string 
     */
    public function getAsset()
    {
        return $this->asset;
    }

    /**
     * Set extension
     *
     * @param string $extension
     * @return AssetType
     */
    public function setExtension($extension)
    {
        $this->extension = $extension;

        return $this;
    }

    /**
     * Get extension
     *
     * @return string 
     */
    public function getExtension()
    {
        return $this->extension;
    }

    /**
     * Set location
     *
     * @param string $location
     * @return AssetType
     */
    public function setLocation($location)
    {
        $this->location = $location;

        return $this;
    }

    /**
     * Get location
     *
     * @return string 
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * Set path
     *
     * @param string $path
     * @return AssetType
     */
    public function setPath($path)
    {
        $this->path = $path;

        return $this;
    }

    /**
     * Get path
     *
     * @return string 
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return AssetType
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }
}
