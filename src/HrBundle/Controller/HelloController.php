<?php

namespace HrBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HelloController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('HrBundle:Hello:index.html.twig',
            array('name' => $name));
    }
}
