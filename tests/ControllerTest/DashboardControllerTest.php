<?php

namespace App\ControllerTest;

use HWI\Bundle\OAuthBundle\Security\Core\Authentication\Token\OAuthToken;
use Symfony\Bundle\FrameworkBundle\Client;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\BrowserKit\Cookie;

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
