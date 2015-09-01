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
     * @var integer
     *
     * @ORM\Column(name="client_id", type="integer", precision=0, scale=0, nullable=false, unique=false)
     */
    private $clientId;

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
     * Get codeId
     *
     * @return integer 
     */
    public function getCodeId()
    {
        return $this->codeId;
    }

    /**
     * Set clientId
     *
     * @param integer $clientId
     * @return OauthCode
     */
    public function setClientId($clientId)
    {
        $this->clientId = $clientId;

        return $this;
    }

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
}
