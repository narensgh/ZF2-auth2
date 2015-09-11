<?php

namespace Application\Controller;

/**
 * Description of TokenController
 * Handles http request to create new accessToken
 * @author narendra.singh
 */
use Application\Controller\BaseController;
use Zend\View\Model\JsonModel;
use Service\AccessToken;
use Service\Authorize;

class AccesstokenController extends BaseController
{

    function __construct()
    {

    }

    public function getList()
    {
        return new JsonModel(array('response' => 'method not allowed..!!'));
    }

    public function get($id)
    {
        return new JsonModel(array('response' => 'method not allowed..!!'));
    }

    public function create($data)
    {
        $data = (object) $data;
        $accessToken = new AccessToken($this->getEntityManager());
        $inputResponse = $accessToken->validateInput($data);
        if ($inputResponse) {
            $codeResponse = $accessToken->validateCode($data);
            if ($codeResponse) {
                $user = $accessToken->getUser($data->userId);
                $token = $accessToken->getExistingAccessToken($user);
                $tokenResponse = false;
                if ($token) {
                    $authorize = new Authorize();
                } else {
                    $token = $accessToken->generateAccessToken();
                    $tokenResponse = $accessToken->setAccessToken($token, $user);
                }
            }
        }
        $response = array();
        if ($tokenResponse || $token) {
            $response = array(
                'accessToken' => $token
            );
        }
        return new JsonModel(array('response' => $response));
    }

}