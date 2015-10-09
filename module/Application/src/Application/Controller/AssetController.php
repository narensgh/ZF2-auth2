<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace Application\Controller;

/**
 * Description of Asset
 *
 * @author narendra.singh
 */
use Zend\File\Transfer\Adapter\Http;
use Zend\View\Model\JsonModel;

class AssetController extends BaseController
{

    function __construct()
    {
        
    }

    public function getList()
    {
        return new JsonModel(array('response' => 'method not allowed..!!'));
    }

    public function get()
    {
        return new JsonModel(array('response' => 'method not allowed..!!'));
    }

    public function create()
    {
        $request = $this->getRequest();
        if ($request->isPost()) {
            $post = array_merge_recursive($request->getPost()->toArray(), $request->getFiles()->toArray());
            $adapter = new Http();
            $fileName = $post['Filedata']['name'];
            $adapter->setDestination('./public/asset/');
            try {
                $adapter->receive($fileName);
                return new JsonModel(array('imagePath' => $adapter->getFileName()));
            } catch (\Exception $ex) {
                echo $ex->getMessage();
            }
        }
    }

}