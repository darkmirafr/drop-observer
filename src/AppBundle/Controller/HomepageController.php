<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class HomepageController extends Controller
{

    public function indexAction(Request $request)
    {
        return $this->render('homepage/index.html.twig');
    }
}
