<?php

namespace Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * OauthCode
 *
 * @ORM\Table(name="oauth_code", indexes={@ORM\Index(name="client_id", columns={"client_id"})})
 * @ORM\Entity
 */
class OauthCode
{
    /**
     * @var integer
     *
     * @ORM\Column(name="code_id", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $codeId;

    /**
     * @var string
     *
     * @ORM\Column(name="code", type="string", length=64, precision=0, scale=0, nullable=false, unique=false)
     */
    private $code;

    /**
     * @var string
     *
     * @ORM\Column(name="expired", type="string", precision=0, scale=0, nullable=false, unique=false)
     */
    private $expired;

    /**
     * @var \Entity\OauthClient
     *
     * @ORM\ManyToOne(targetEntity="Entity\OauthClient")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="client_id", referencedColumnName="client_id", nullable=true)
     * })
     */
    private $client;


    /**
     * Get codeId
     *
     * @return integer 
     */
    public function getCodeId()
    {
        return $this->codeId;
    }

    /**
     * Set code
     *
     * @param string $code
     * @return OauthCode
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get code
     *
     * @return string 
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set expired
     *
     * @param string $expired
     * @return OauthCode
     */
    public function setExpired($expired)
    {
        $this->expired = $expired;

        return $this;
    }

    /**
     * Get expired
     *
     * @return string 
     */
    public function getExpired()
    {
        return $this->expired;
    }

    /**
     * Set client
     *
     * @param \Entity\OauthClient $client
     * @return OauthCode
     */
    public function setClient(\Entity\OauthClient $client = null)
    {
        $this->client = $client;

        return $this;
    }

    /**
     * Get client
     *
     * @return \Entity\OauthClient 
     */
    public function getClient()
    {
        return $this->client;
    }
}
