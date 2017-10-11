<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Message;
use Doctrine\Common\Collections\ArrayCollection;
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
        $message = new Message();
        $message->setTweet('These are our first steps');

        return $this->handleView($this->view(new ArrayCollection([$message]), Response::HTTP_I_AM_A_TEAPOT));
    }

}
