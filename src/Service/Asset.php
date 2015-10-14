<?php

/**
 * @author Narendra Singh
 */
namespace Service;

/**
 * Description of Asset
 *
 * @author narendra.singh
 */
use Zend\Http\Client;
use Entity\Asset as Assets;

class Asset
{

    private $em;

    function __construct($em)
    {
        if (!$this->em) {
            $this->em = $em;
        }
    }

    /**
     * 
     * @param type $asset
     * @return type
     */
    public function getAssetType($asset)
    {
        $assetType = $this->em->getRepository('Entity\\AssetType')
                ->findOneBy(array('asset' => $asset));
        return $assetType;
    }

    /**
     * 
     * @param type $assetType
     * @param type $post
     * @return boolean
     */
    public function uploadAsset($assetType, $post)
    {
        $filename = strtolower(str_replace("_", "", $post['assetType'])) . '-' . $post['uniqueId'];
        $filepath = realpath($post['Filedata']['tmp_name']);
        $finename = $post['Filedata']['name'];
        $extension = pathinfo($finename, PATHINFO_EXTENSION);
        $destination = $assetType->getPath() . '/' . $filename . "." . $extension;

        $client = new Client();
        $client->setMethod('POST');
        $client->setUri('http://imageserver.local.com/Upload.php');
        $client->setFileUpload($filepath, 'filepath');
        $client->setParameterPost(array(
            'destination' => $destination
        ));
        $response = $client->send();
        if ($response->isSuccess()) {
            return array(
                'filepath' => $response->getContent(),
                'filename' => $filename
            );
        }
    }

    public function saveAsset($assetData, $assetType)
    {
        $asset = new Assets();
        $date = new \DateTime();
        $asset->setAssetType($assetType);
        $asset->setFilename($assetData['filename']);
        $asset->setDateAdded($date);
        try {
            $this->em->persist($asset);
            $this->em->flush();
            return $asset->getAssetId();
        } catch (\Exception $ex) {
            throw new \Exception($ex->getMessage());
        }
    }

}