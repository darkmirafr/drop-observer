<?php

namespace App\Controller;

use App\Service\TwitterService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\StreamedResponse;

class ApiController extends AbstractController
{
    public function index(TwitterService $twitterService)
    {
        $response = new StreamedResponse();
        // disables FastCGI buffering in Nginx only for this response
        $response->headers->set('X-Accel-Buffering', 'no');

        $response->setCallback(function () {
            while (true){
                sleep(1);
                echo random_int(0,1);
                flush();
            }
        });
        $response->send();
    }
}
