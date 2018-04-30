<?php

namespace App\ControllerTest;

use Symfony\Bundle\FrameworkBundle\Client;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{
    /** @var Client */
    private $client;

    public function setUp()
    {
        $this->client = self::createClient();
    }

    public function testIndexPageIsSuccessful()
    {
        $this->client->request('GET', '/');

        $this->assertTrue($this->client->getResponse()->isSuccessful());
    }

    public function testClickOnLoginPageIsSuccessful()
    {
        $crawler = $this->client->request('GET', '/');

        $link = $crawler
            ->filter('a:contains("Login")')
            ->eq(0)
            ->link();
        $this->client->click($link);

        $this->assertTrue($this->client->getResponse()->isRedirection());
    }
}
