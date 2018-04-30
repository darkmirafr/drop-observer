<?php

namespace App\ControllerTest;

use Symfony\Bundle\FrameworkBundle\Client;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DashboardControllerTest extends WebTestCase
{
    /** @var Client */
    private $client;

    public function setUp()
    {
        $this->client = self::createClient();
    }

    public function testDashboardPageIsRedirectToLogin()
    {
        $this->client->request('GET', '/dashboard');

        $this->assertTrue($this->client->getResponse()->isRedirect('http://localhost/login'));
    }
}
