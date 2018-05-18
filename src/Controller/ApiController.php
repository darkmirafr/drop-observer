<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\StreamedResponse;

class ApiController extends AbstractController
{
    public function index()
    {
        ob_implicit_flush(1);
        $response = new StreamedResponse();
        // disables FastCGI buffering in Nginx only for this response
        $response->headers->set('X-Accel-Buffering', 'no');

        $response->setCallback(function () {
            while (true) {
                sleep(1);
                echo random_int(0, 1);
            }
        });
        $response->send();
    }
}
