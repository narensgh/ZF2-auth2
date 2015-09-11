<?php

namespace Service;

/**
 * Description of AccessToken
 *
 * @author narendra.singh
 */
use Entity\OauthToken;

class AccessToken
{

    /**
     * Doctrine em object
     * @var object
     */
    private $em;

    /**
     * Sets em to private variable
     * @param DoctrineOrm Object $em
     */
    function __construct($em)
    {
        $this->em = $em;
    }

    /**
     * Validate inputs for blank and set
     * @param object $data
     * @return boolean
     * @throws \Exception
     */
    public function validateInput($data)
    {
        if (!isset($data->clientId) || empty($data->clientId)) {
            throw new \Exception('Client id must be set.');
        }
        if (!isset($data->clientSecret) || empty($data->clientSecret)) {
            throw new \Exception('Client secret must be set.');
        }
        if (!isset($data->redirectUri) || empty($data->redirectUri)) {
            throw new \Exception('redirectUri must be set.');
        }
        if (!isset($data->code) || empty($data->code)) {
            throw new \Exception('code must be set.');
        }
        if (!isset($data->userId) || empty($data->userId)) {
            throw new \Exception('user id must be set.');
        }
        return true;
    }

    /**
     * checks if the client is valid or not
     * @param Object $data
     * @return mixed Object
     * @throws \Exception
     */
    public function validateCode($data)
    {
        $param = array(
            'clientId' => $data->clientId,
            'clientSecret' => $data->clientSecret,
            'redirectUri' => $data->redirectUri,
        );
        try {
            $client = $this->em->getRepository('Entity\\OauthClient')
                    ->findOneBy($param);
            $code = $this->em->getRepository('Entity\\OauthCode')
                    ->findOneBy(array('code' => $data->code, 'client' => $client, 'expired' => 'false'));
            if ($client && $code) {
                return true;
            }
            return false;
        } catch (\Exception $ex) {
            throw new \Exception($ex->getMessage());
        }
    }

    /**
     *
     * @param int $userId
     * @return string
     * @throws \Exception
     */
    public function getExistingAccessToken($user)
    {
        try {
            $accessToken = $this->em->getRepository('Entity\\OauthToken')
                    ->findOneBy(array('user' => $user, 'expired' => 'no'));
            if ($accessToken) {
                return $accessToken->getToken();
            }
            return false;
        } catch (\Exception $ex) {
            throw new \Exception($ex->getMessage());
        }
    }

    /**
     *
     * @return string
     */
    public function generateAccessToken()
    {
        $date = new \DateTime();
        return md5($date->getTimestamp() . "narendra");
    }

    /**
     *
     * @param int $userId
     * @return object
     */
    public function getUser($userId)
    {
        $user = $this->em->getRepository('Entity\\User')
                ->find($userId);
        return $user;
    }

    /**
     *
     * @param string $token
     * @param object $user
     * @return boolean
     * @throws \Exception
     */
    public function setAccessToken($token, $user)
    {
        $oauthToken = new OauthToken();
        $oauthToken->setToken($token);
        $oauthToken->setUser($user);
        $oauthToken->setExpired('no');
        try {
            $this->em->persist($oauthToken);
            $this->em->flush();
            return true;
        } catch (\Exception $ex) {
            throw new \Exception($ex->getMessage());
        }
    }
}