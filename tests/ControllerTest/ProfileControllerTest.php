<?php

namespace App\ControllerTest;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ProfileControllerTest extends WebTestCase
{
    public function testProfilePageIsRedirect()
    {
        $client = self::createClient();
        $client->request('GET', '/profile');

        $this->assertTrue($client->getResponse()->isRedirection());
    }
}
