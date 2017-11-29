<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class HomeController extends Controller
{

    public function indexAction(Request $request)
    {
        $json = file_get_contents('http://api.icndb.com/jokes/random');
        return $this->render('home/index.html.twig', [
            'joke' => json_decode($json, true)['value']['joke'],
        ]);
    }
}
