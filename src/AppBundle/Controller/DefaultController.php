<?php

namespace AppBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends FOSRestController
{
    public function postTweetAction(Request $request)
    {
        // $data = json_decode($request->getContent(), true);

        $logger = $this->get('logger');
        $logger->critical($request->getContent());
        $logger->debug($request->getContent());

        // TODO Continue
    }
}
