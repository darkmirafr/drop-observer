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

    public function testAuthenticatedDashboardPageIsIsSuccessful()
    {
        $this->logIn();
        $this->client->request('GET', '/dashboard');

        $this->assertTrue($this->client->getResponse()->isSuccessful());
    }

    private function logIn()
    {
        $session = $this->client->getContainer()->get('session');

        $token = new OAuthToken('accessToken', ['ROLE_USER']);
        $session->set('_security_secured_area', serialize($token));
        $session->save();

        $cookie = new Cookie($session->getName(), $session->getId());
        $this->client->getCookieJar()->set($cookie);
    }
}
