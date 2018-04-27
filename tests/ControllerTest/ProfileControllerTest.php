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

    public function testClickOnLoginPageIsSuccessful()
    {
        $client = self::createClient();
        $client->followRedirects();
        $crawler = $client->request('GET', '/');

        $link = $crawler
            ->filter('a:contains("Login")')
            ->eq(0) // select the second link in the list
            ->link()
        ;
        $client->click($link);

        $this->assertTrue($client->getResponse()->isSuccessful());
    }

    public function testLoginPageIsSuccessful()
    {
        $client = self::createClient();
        $client->request('GET', '/login');

        $this->assertTrue($client->getResponse()->isRedirection());
    }
}
