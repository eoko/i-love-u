<?php

namespace LuvBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('LuvBundle:Default:index.html.twig');
    }
}
