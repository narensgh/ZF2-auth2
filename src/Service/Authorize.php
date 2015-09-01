<?php

namespace Service;

/**
 * Description of AuthorizeService
 * responsible to handle authorize calls
 * @author narendra.singh
 */
use Entity\OauthCode;

class Authorize
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
        return true;
    }

    /**
     * checks if the client is valid or not
     * @param Object $data
     * @return mixed Object
     * @throws \Exception
     */
    public function validateClient($data)
    {
        $param = array(
            'clientId' => $data->clientId,
            'clientSecret' => $data->clientSecret,
            'redirectUri' => $data->redirectUri,
        );
        try {
            $client = $this->em->getRepository('Entity\\OauthClient')
                    ->findOneBy($param);
            return $client;
        } catch (\Exception $ex) {
            throw new \Exception($ex->getMessage());
        }
    }

    /**
     * generates timespamp for code
     * @return string
     */
    public function getOauthCode()
    {
        $date = new \DateTime();
        return $date->getTimestamp();
    }

    /**
     * Sets oauth code to database.
     * @param string $authCode
     * @param object $client
     * @return boolean
     * @throws \Exception
     */
    public function setOauthCode($authCode, $client)
    {
        $oauthCode = new OauthCode();
        $oauthCode->setClientId($client);
        $oauthCode->setCode($authCode);
        $oauthCode->setExpired(false);
        try {
            $this->em->persist($oauthCode);
            $this->em->flush();
            return true;
        } catch (\Exception $ex) {
            throw new \Exception($ex->getMessage());
        }
    }
}
