<?php

namespace AppBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends FOSRestController
{
    public function postTweetAction(Request $request)
    {
        $data = json_decode($request->getContent(), true);
        $log = new Logger('event');
        $log->pushHandler(new StreamHandler('php://stderr', Logger::DEBUG));
        $log->addDebug('Foo', $data);

        // TODO Continue
    }
}
