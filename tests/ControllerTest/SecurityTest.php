<?php

namespace App\ControllerTest;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Client;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class SecurityTest extends WebTestCase
{
    /** @var Client */
    private $client;

    public function setUp()
    {
        $this->client = self::createClient();
    }

    public function testLoginPageIsSuccessful()
    {
        $this->client->request('GET', '/login');

        $this->assertTrue($this->client->getResponse()->isRedirect('http://localhost/login/'));
    }

    public function testUserIsInstantiable()
    {
        $user = new User();
        $user->setUsername('phpunit-user');
        $user->setEmail('phpunit@test.me');
        $roles = ['ROLE_USER'];
        $user->setRoles($roles);
        $user->setTwitterAccessToken('phpunitTwitterAccessToken');
        $user->setTwitterAccessTokenSecret('phpunitTwitterAccessTokenSecret');
        $user->setTwitterConsumerKey('phpunitTwitterConsumerKey');
        $user->setTwitterConsumerSecret('phpunitTwitterConsumerSecret');

        $this->assertInstanceOf(User::class, $user);
        $this->assertSame('phpunit-user', $user->getUsername());
        $this->assertSame('phpunit@test.me', $user->getEmail());
        $this->assertSame($roles, $user->getRoles());
        $this->assertSame('phpunitTwitterAccessToken', $user->getTwitterAccessToken());
        $this->assertSame('phpunitTwitterAccessTokenSecret', $user->getTwitterAccessTokenSecret());
        $this->assertSame('phpunitTwitterConsumerKey', $user->getTwitterConsumerKey());
        $this->assertSame('phpunitTwitterConsumerSecret', $user->getTwitterConsumerSecret());
    }
}
