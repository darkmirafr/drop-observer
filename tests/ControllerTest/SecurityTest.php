<?php

namespace App\ControllerTest;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class SecurityTest extends WebTestCase
{
    public function testLoginPageIsSuccessful()
    {
        $client = self::createClient();
        $client->request('GET', '/login');

        $this->assertTrue($client->getResponse()->isRedirection());
    }

    public function testUserIsInstantiable()
    {
        $user = new User;
        $user->setUsername('phpunit-user');
        $user->setEmail('phpunit@test.me');
        $user->setPassword('phpunittestpassword');
        $user->setTwitterAccessToken('phpunitTwitterAccessToken');
        $user->setTwitterAccessTokenSecret('phpunitTwitterAccessTokenSecret');
        $user->setTwitterConsumerKey('phpunitTwitterConsumerKey');
        $user->setTwitterConsumerSecret('phpunitTwitterConsumerSecret');

        $this->assertInstanceOf(User::class, $user);
    }
}
