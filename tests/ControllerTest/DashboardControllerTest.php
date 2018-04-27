<?php

namespace App\ControllerTest;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DashboardControllerTest extends WebTestCase
{
    public function testDashboardPageIsRedirect()
    {
        $client = self::createClient();
        $client->request('GET', '/dashboard');

        $this->assertTrue($client->getResponse()->isRedirection());
    }
}
