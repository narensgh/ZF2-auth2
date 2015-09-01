<?php

namespace Application\Controller;

use Application\Controller\BaseController;
use Zend\View\Model\JsonModel;
use Service\Authorize;

class AuthorizeController extends BaseController
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
        $response = array();
        $data = (object) $data;
        $authorize = new Authorize($this->getEntityManager());
        $inputResponse = $authorize->validateInput($data);
        if ($inputResponse) {
            $client = $authorize->validateClient($data);
        }
        if ($client) {
            $authCode = $authorize->getOauthCode();
            $authResponse = $authorize->setOauthCode($authCode, $data->clientId);
        }
        if ($authResponse) {
            $response = array(
                'code' => $authCode
            );
        }
        return new JsonModel(array('response' => $response));
    }

}