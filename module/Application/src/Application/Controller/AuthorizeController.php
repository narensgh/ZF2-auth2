<?php

/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */
namespace Application\Controller;

use Zend\Mvc\Controller\AbstractRestfulController;
use Zend\View\Model\JsonModel;

class AuthorizeController extends AbstractRestfulController
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
        print_r($data);
        die('tested');
    }
}
