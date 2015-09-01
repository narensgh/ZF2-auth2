<?php

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractRestfulController;

/**
 * Description of BaseController
 *
 * @author narendra.singh
 */
class BaseController extends AbstractRestfulController
{

    protected $em;

    public function getEntityManager()
    {
        if (!$this->em) {
            $sm = $this->getServiceLocator();
            $this->em = $sm->get('Doctrine\ORM\EntityManager');
        }
        return $this->em;
    }
}
