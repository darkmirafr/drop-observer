<?php

namespace App\ControllerTest;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{
    /**
     * @dataProvider urlProvider
     */
    public function testPageIsSuccessful($url)
    {
        $client = self::createClient();
        $client->request('GET', $url);

        $this->assertTrue($client->getResponse()->isSuccessful());
    }

    public function urlProvider()
    {
        yield ['/'];
        yield ['/login'];
        yield ['/admin'];
    }

    public function userIsRoleUser()
    {
        $this->assertSame('ROLE_USER', (new User)->getRoles()[0]);
    }
}
