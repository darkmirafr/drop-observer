<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DashboardController extends AbstractController
{
    public function index()
    {
        return $this->render('dashboard/index.html.twig');
    }
}
