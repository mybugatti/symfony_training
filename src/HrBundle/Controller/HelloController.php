<?php

namespace HrBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class HelloController extends Controller
{
    public function indexAction($name, $sexe)
    {

        if ($sexe == "h") {
            $sexe = "masculin";
            $qualification = "Mr";
        } else {
            $sexe = "feminin";
            $qualification = "Mme";
        }
        return $this->render('HrBundle:Hello:index.html.twig',
            array('name' => $name, 'sexe' => $sexe, 'qualification' => $qualification));
    }

    public function helloAction($name)
    {
        return new Response('Hello ' . $name . ', you are in the "hello" action (controller)');
    }


}