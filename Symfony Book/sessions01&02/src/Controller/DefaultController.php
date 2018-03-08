<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;


class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function index()
    {
        $colours = [
            'foreground' => 'black',
            'background' => 'white'
        ];
        $default_colours = true;
        $template = 'default\homepage.html.twig';
        $args = [
            'colours' => $colours,
            'default_colours' => $default_colours
        ];
        return $this->render($template, $args);
    }
}
