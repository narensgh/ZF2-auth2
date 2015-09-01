<?php

namespace Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * OauthClient
 *
 * @ORM\Table(name="oauth_client")
 * @ORM\Entity
 */
class OauthClient
{
    /**
     * @var integer
     *
     * @ORM\Column(name="client_id", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $clientId;

    /**
     * @var string
     *
     * @ORM\Column(name="client_secret", type="string", length=32, precision=0, scale=0, nullable=false, unique=false)
     */
    private $clientSecret;

    /**
     * @var string
     *
     * @ORM\Column(name="redirect_uri", type="string", length=255, precision=0, scale=0, nullable=false, unique=false)
     */
    private $redirectUri;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_added", type="datetime", precision=0, scale=0, nullable=false, unique=false)
     */
    private $dateAdded;


    /**
     * Get clientId
     *
     * @return integer 
     */
    public function getClientId()
    {
        return $this->clientId;
    }

    /**
     * Set clientSecret
     *
     * @param string $clientSecret
     * @return OauthClient
     */
    public function setClientSecret($clientSecret)
    {
        $this->clientSecret = $clientSecret;

        return $this;
    }

    /**
     * Get clientSecret
     *
     * @return string 
     */
    public function getClientSecret()
    {
        return $this->clientSecret;
    }

    /**
     * Set redirectUri
     *
     * @param string $redirectUri
     * @return OauthClient
     */
    public function setRedirectUri($redirectUri)
    {
        $this->redirectUri = $redirectUri;

        return $this;
    }

    /**
     * Get redirectUri
     *
     * @return string 
     */
    public function getRedirectUri()
    {
        return $this->redirectUri;
    }

    /**
     * Set dateAdded
     *
     * @param \DateTime $dateAdded
     * @return OauthClient
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
}
