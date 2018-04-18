<?php

namespace App\ControllerTest;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class AdminControllerTest extends WebTestCase
{
    public function testAdminPageIsRedirect()
    {
        $client = self::createClient();
        $client->request('GET', '/admin');

        $this->assertTrue($client->getResponse()->isRedirection());
    }

    public function testUserIsInstantiable()
    {
        $user = new User;
        $user->setUsername('phpunit-user');
        $user->setEmail('phpunit@test.me');
        $user->setPassword('phpunittestpassword');

        $this->assertInstanceOf(User::class, $user);
    }

    public function testUserIsRoleUser()
    {
        $this->assertSame('ROLE_USER', (new User)->getRoles()[0]);
    }
}
