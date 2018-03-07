<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DefaultController extends AbstractController
{
    public function index()
    {
        return $this->render('default/index.html.twig');
    }

    public function login()
    {
        return $this->render('default/login.html.twig');
    }

    public function admin()
    {
        return $this->render('default/admin.html.twig');
    }

}
