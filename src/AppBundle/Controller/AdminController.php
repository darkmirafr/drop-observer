<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class AdminController extends Controller
{
    public function indexAction()
    {
        return $this->render('admin/index.html.twig', [
            'joke' => json_decode(file_get_contents('http://api.icndb.com/jokes/random'))->value->joke,
        ]);
    }
}
