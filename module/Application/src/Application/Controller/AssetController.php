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
use Zend\View\Model\JsonModel;
use Service\Asset;

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
            $assetService = new Asset($this->getEntityManager());
            $assetType = $assetService->getAssetType($post['assetType']);
            $asset = $assetService->uploadAsset($assetType, $post);
            if ($asset) {
                $response = $assetService->saveAsset($asset, $assetType);
            }
            if ($response) {
                $asset['assetId'] = $response;
            } else {
                $asset = array('error' => 'some error occured while adding asset');
            }
            return new JsonModel($asset);
        }
    }

}