<?php

namespace App\ControllerTest;

use Symfony\Bundle\FrameworkBundle\Client;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\BrowserKit\Cookie;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;

class ProfileControllerTest extends WebTestCase
{
    /** @var Client */
    private $client;

    public function setUp()
    {
        $this->client = self::createClient();
    }

    public function testProfilePageIsRedirect()
    {
        $this->client->request('GET', '/profile');

        $this->assertTrue($this->client->getResponse()->isRedirect('http://localhost/login'));
    }

    public function testAuthenticatedProfilePageIsIsSuccessful()
    {
        $this->logIn();
        $this->client->request('GET', '/profile');

        $this->assertTrue($this->client->getResponse()->isSuccessful());
    }

    private function logIn()
    {
        $session = $this->client->getContainer()->get('session');

        $token = new UsernamePasswordToken('admin', null, 'secured_area', array('ROLE_USER'));
        $session->set('_security_secured_area', serialize($token));
        $session->save();

        $cookie = new Cookie($session->getName(), $session->getId());
        $this->client->getCookieJar()->set($cookie);
    }
}
