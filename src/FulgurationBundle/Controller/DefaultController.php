<?php

namespace FulgurationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('FulgurationBundle:Default:index.html.twig');
    }
}
