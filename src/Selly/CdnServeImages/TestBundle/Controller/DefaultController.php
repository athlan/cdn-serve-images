<?php

namespace Selly\CdnServeImages\TestBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('SellyCdnServeImagesTestBundle:Default:index.html.twig');
    }
}
