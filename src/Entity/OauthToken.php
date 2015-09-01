<?php

namespace Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * OauthToken
 *
 * @ORM\Table(name="oauth_token", indexes={@ORM\Index(name="people_id", columns={"user_id", "token"}), @ORM\Index(name="people_id_2", columns={"user_id"})})
 * @ORM\Entity
 */
class OauthToken
{
    /**
     * @var integer
     *
     * @ORM\Column(name="token_id", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $tokenId;

    /**
     * @var string
     *
     * @ORM\Column(name="token", type="string", length=64, precision=0, scale=0, nullable=false, unique=false)
     */
    private $token;

    /**
     * @var string
     *
     * @ORM\Column(name="expired", type="string", precision=0, scale=0, nullable=false, unique=false)
     */
    private $expired;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="update_time", type="datetime", precision=0, scale=0, nullable=false, unique=false)
     */
    private $updateTime;

    /**
     * @var \Entities\User
     *
     * @ORM\ManyToOne(targetEntity="Entities\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_id", referencedColumnName="user_id", nullable=true)
     * })
     */
    private $user;


    /**
     * Get tokenId
     *
     * @return integer 
     */
    public function getTokenId()
    {
        return $this->tokenId;
    }

    /**
     * Set token
     *
     * @param string $token
     * @return OauthToken
     */
    public function setToken($token)
    {
        $this->token = $token;

        return $this;
    }

    /**
     * Get token
     *
     * @return string 
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * Set expired
     *
     * @param string $expired
     * @return OauthToken
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
     * Set updateTime
     *
     * @param \DateTime $updateTime
     * @return OauthToken
     */
    public function setUpdateTime($updateTime)
    {
        $this->updateTime = $updateTime;

        return $this;
    }

    /**
     * Get updateTime
     *
     * @return \DateTime 
     */
    public function getUpdateTime()
    {
        return $this->updateTime;
    }

    /**
     * Set user
     *
     * @param \Entities\User $user
     * @return OauthToken
     */
    public function setUser(\Entities\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \Entities\User 
     */
    public function getUser()
    {
        return $this->user;
    }
}
