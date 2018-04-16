<?php

namespace App\ControllerTest;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class SecurityControllerTest extends WebTestCase
{
    public function testLoginPageIsSuccessful()
    {
        $client = self::createClient();
        $client->request('GET', '/login');

        $this->assertTrue($client->getResponse()->isSuccessful());
    }

    public function testLoginFormIsRedirection()
    {
        $client = self::createClient();
        $crawler = $client->request('GET', '/login');

        $form = $crawler->selectButton('Submit')->form();
        $form['user[email]'] = 'phpunit@test.com';
        $form['user[password]'] = 'phpunitiswrongtestpassword';
        $client->submit($form);

        $this->assertTrue($client->getResponse()->isRedirection());
    }
}
