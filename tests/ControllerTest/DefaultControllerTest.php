<?php

namespace App\ControllerTest;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{
    public function testIndexPageIsSuccessful()
    {
        $client = self::createClient();
        $client->request('GET', '/');

        $this->assertTrue($client->getResponse()->isSuccessful());
    }

    public function testClickOnLoginPageIsSuccessful()
    {
        $client = self::createClient();
        $client->followRedirects();
        $crawler = $client->request('GET', '/');

        $link = $crawler
            ->filter('a:contains("Login")')
            ->eq(0)
            ->link()
        ;
        $client->click($link);

        $this->assertTrue($client->getResponse()->isSuccessful());
    }
}
