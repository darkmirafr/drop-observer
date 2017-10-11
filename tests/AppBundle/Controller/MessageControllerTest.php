<?php

namespace Tests\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

class MessageControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $client->request('GET', '/api/messages');

        $this->assertEquals(Response::HTTP_I_AM_A_TEAPOT, $client->getResponse()->getStatusCode());
    }
}
