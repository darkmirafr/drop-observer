<?php

namespace AppBundle\Controller;
//
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Response;

class MessageController extends FOSRestController
{

    /**
     * [GET] /messages
     * @Rest\View()
     */
    public function getMessagesAction()
    {
        return $this->handleView($this->view('These are our first steps', Response::HTTP_I_AM_A_TEAPOT));
    }

}
