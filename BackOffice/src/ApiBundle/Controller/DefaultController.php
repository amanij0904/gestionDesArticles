<?php

namespace ApiBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

use FOS\RestBundle\Controller\Annotations\Get;
use FOS\RestBundle\Controller\Annotations as Rest;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;


class DefaultController extends FOSRestController
{
    /**
     * @Rest\View()
     * @Rest\Get("/admin")
     */
    public function getAdminAction()
    {
        $em = $this->getDoctrine()->getManager();
        $articles = $em->getRepository('ApiBundle:Article')->findAll();
        return  $articles;
        
    }
}
